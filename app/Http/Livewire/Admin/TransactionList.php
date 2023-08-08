<?php

namespace App\Http\Livewire\Admin;

use App\Mail\Invoice;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PaymentHistory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use PDF;

class TransactionList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $isOpen = 0, $searchItem, $startDate, $endDate;
    public $transactionId, $studentName, $programId, $paymentMethod, $amount, $currency,  $paymentDate, $status;

    public function render()
    {
        $transactions = PaymentHistory::query()
            ->whereBetween('created_at', [
                !empty($this->startDate) ? Carbon::parse($this->startDate)->startOfDay() : Carbon::now()->subMonth(), // Default to one month ago if not provided
                !empty($this->endDate) ?  Carbon::parse($this->endDate)->endOfDay() : Carbon::now(),
            ])
            ->with('student', 'program:program_title,id')
            ->when($this->searchItem, function ($query, $search) {
                $query->where('transaction_id', 'LIKE', "%{$search}%");
            })
            ->paginate(10);
        // dd($transactions);
        return view('livewire.admin.transaction-list', ['transactions' => $transactions]);
    }

    public function openModal()
    {
        $this->isOpen = true;
        // dd('as');
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function view($id)
    {
        // dd($id);
        $this->openModal();
        $transaction = PaymentHistory::with('student', 'program:program_title,id')->whereId($id)->first();
        // dd($transaction);
        // dd(get_program_university_name($transaction->program_id));
        $this->transactionId = $transaction->transaction_id;
        $this->studentName = $transaction->student->full_name;
        $this->programId = get_program_university_name($transaction->program_id);
        $this->paymentMethod = $transaction->payment_method;
        $this->amount = $transaction->amount;
        $this->currency = $transaction->currency;
        $this->transactionId = $transaction->transaction_id;
        $this->paymentDate = date('M d, Y', strtotime($transaction->payment_date));
        $this->status = $transaction->status;
    }

    public function sendInvoice($id)
    {
        $transaction = PaymentHistory::with('student', 'program:program_title,id')->whereId($id)->first();

        // dd($transaction);
        try {
            //code...
            $pdf = PDF::loadView('pdf.invoice', compact('transaction'));
            // $transaction["pdf"] = $pdf;
            // return $pdf->setPaper('a4')->stream();
            Mail::to($transaction->student->email)->send(new Invoice($transaction, $pdf));
            dd('Email sent successfully');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
}
