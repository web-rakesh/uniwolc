<?php

namespace App\Http\Controllers\Student;

use Exception;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\DB;
use Stripe\Exception\CardException;
use App\Http\Controllers\Controller;
use App\Models\Student\ApplyProgram;
use Illuminate\Support\Facades\Auth;
use PDF;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $id = explode(",", $request->ids);

        if (Auth::user()->type == 'agent') {
            $applyPg = ApplyProgram::whereAgentId(Auth::user()->id)->whereIn('id', $id)->first();
            $studentId = $applyPg->user_id;
            $totalPayableAmount = ApplyProgram::whereUserId($studentId)->whereIn('id', $id)->sum('fees');
        } elseif (Auth::user()->type == 'staff') {
            $applyPg = ApplyProgram::whereStaffId(Auth::user()->id)->whereIn('id', $id)->first();
            $studentId = $applyPg->user_id;
            $totalPayableAmount = ApplyProgram::whereUserId($studentId)->whereIn('id', $id)->sum('fees');
            return view('staff.payment-confirm', compact('totalPayableAmount', 'id'));
        } else {
            $totalPayableAmount = ApplyProgram::whereUserId(Auth::user()->id)->whereIn('id', $id)->sum('fees');

            $studentId = Auth::user()->id;
        }
        // return $totalPayableAmount;
        // return $totalPayableAmount = ApplyProgram::whereUserId(Auth::user()->id)->whereIn('id', $id)->sum('fees');
        return view('students.payment-confirm', compact('totalPayableAmount', 'id'));
    }
    public function payment(Request $request)
    {
        $id = $request->id;
        // $totalPayableAmount = ApplyProgram::whereUserId(Auth::user()->id)->whereIn('id', $id)->sum('fees');
        // $id = implode(",", $request->id);


        if (Auth::user()->type == 'agent') {
            $applyPg = ApplyProgram::whereAgentId(Auth::user()->id)->whereIn('id', $id)->first();
            $studentId = $applyPg->user_id;
            $totalPayableAmount = ApplyProgram::whereUserId($studentId)->whereIn('id', $id)->sum('fees');
        } elseif (Auth::user()->type == 'staff') {
            $applyPg = ApplyProgram::whereStaffId(Auth::user()->id)->whereIn('id', $id)->first();
            $studentId = $applyPg->user_id;
            $totalPayableAmount = ApplyProgram::whereUserId($studentId)->whereIn('id', $id)->sum('fees');
            $id = implode(",", $request->id);
            return view('staff.payment', compact('totalPayableAmount', 'id'));
        } else {
            $totalPayableAmount = ApplyProgram::whereUserId(Auth::user()->id)->whereIn('id', $id)->sum('fees');

            $studentId = Auth::user()->id;
        }
        $id = implode(",", $request->id);
        return view('students.payment', compact('totalPayableAmount', 'id'));
    }

    public function processPayment(Request $request)
    {
        $id = explode(",", $request->id);

        // get student id
        if (Auth::user()->type == 'agent') {
            $applyPg = ApplyProgram::whereAgentId(Auth::user()->id)->whereIn('id', $id)->first();
            $studentId = $applyPg->user_id;
            $totalPayableAmount = ApplyProgram::whereUserId($studentId)->whereIn('id', $id)->sum('fees');
        } elseif (Auth::user()->type == 'staff') {

            $applyPg = ApplyProgram::whereStaffId(Auth::user()->id)->whereIn('id', $id)->first();
            $studentId = $applyPg->user_id;

            $totalPayableAmount = ApplyProgram::whereUserId($studentId)->whereIn('id', $id)->sum('fees');
        } else {
            $totalPayableAmount = ApplyProgram::whereUserId(Auth::user()->id)->whereIn('id', $id)->sum('fees');

            $studentId = Auth::user()->id;
        }

        // return $studentId . '<>' . $totalPayableAmount . '<>' . implode(",", $id);
        // Set your Stripe API secret key

        total_payable_amount($totalPayableAmount) * 100;
        DB::beginTransaction();
        try {
            $stripe = new StripeClient(env('STRIPE_SECRET'));

            $paymentStatus = $stripe->paymentIntents->create([
                'amount' => total_payable_amount($totalPayableAmount) * 100,
                'currency' => 'usd',
                'payment_method' => $request->payment_method,
                'description' => 'Uniwolc Student payment with stripe',
                'confirm' => true,
                'receipt_email' => $request->email
            ]);

            if (Auth::user()->type == 1) {
                $applyPg = ApplyProgram::whereAgentId(Auth::user()->id)->whereIn('id', $id)->first();
                $studentId = $applyPg->user_id;
                ApplyProgram::whereUserId($studentId)->whereIn('id', $id)->update(['status' => 2]);
            } elseif (Auth::user()->type == 3) {
                $applyPg = ApplyProgram::whereStaffId(Auth::user()->id)->whereIn('id', $id)->first();
                $studentId = $applyPg->user_id;
                ApplyProgram::whereUserId($studentId)->whereIn('id', $id)->update(['status' => 2]);
            } else {
                $studentId = Auth::user()->id;
                ApplyProgram::whereUserId($studentId)->whereIn('id', $id)->update(['status' => 2]);
            }

            PaymentHistory::create([
                'student_id' => $studentId,
                'program_id' => implode(",", $id),
                'amount' => $paymentStatus->amount / 100,
                'currency' => $paymentStatus->currency,
                'payment_method' => $paymentStatus->payment_method_types[0],
                'transaction_id' => $paymentStatus->id,
                'payment_date' => now(),
                'status' => $paymentStatus->status
            ]);
            DB::commit();
            $amount =  $paymentStatus->amount / 100;
            // dd($paymentStatus);
            if (Auth::user()->type == 1) {
                return redirect()->route('agent.payment.success', ['amount' => $amount])->withSuccess('Payment done.');
            } elseif (Auth::user()->type == 3) {
                return redirect()->route('staff.payment.success', ['amount' => $amount])->withSuccess('Payment done.');
            } else {
                return redirect()->route('student.payment.success', ['amount' => $amount])->withSuccess('Payment done.');
            }


            return redirect()->route('student.payment.success', ['amount' => $amount])->withSuccess('Payment done.');
        } catch (CardException $th) {
            throw new Exception("There was a problem processing your payment", 1);

            DB::rollBack();
        }

        return back()->withSuccess('Payment done.');
    }

    public function paymentSuccess(Request $request)
    {
        // return Auth::user()->type;
        $amount = $request->amount;
        if (Auth::user()->type == 'agent') {
            return view('agents.payment-success', compact('amount'));
        } elseif (Auth::user()->type == 'staff') {
            return view('staff.payment-success', compact('amount'));
        } else {
            return view('students.payment-success', compact('amount'));
        }
        return view('students.payment-success', compact('amount'));
    }

    public function paymentHistory()
    {
        $paymentHistory = PaymentHistory::whereStudentId(Auth::user()->id)->get();
        return view('students.payment-history', compact('paymentHistory'));
    }

    public function Invoice($id)
    {
        $transaction = PaymentHistory::with('student', 'program:program_title,id')->whereId($id)->first();
        $pdf = PDF::loadView('pdf.invoice', compact('transaction'));
        return $pdf->setPaper('a4')->stream();
        return $pdf->download(time() . 'UWC.pdf');
    }
}
