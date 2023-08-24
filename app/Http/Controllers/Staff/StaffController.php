<?php

namespace App\Http\Controllers\Staff;

use App\Models\User;
use App\Models\Staff;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\GradingScheme;
use App\Models\EducationLevel;
use App\Models\Student\VisaPermit;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AgentCommission;
use App\Models\PaymentHistory;
use App\Models\Student\ApplyProgram;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentDetail;
use App\Models\Student\EducationSummary;

class StaffController extends Controller
{
    public function index()
    {
        $data['totalStudent'] = StudentDetail::where('staff_id', Auth::user()->id)->count();
        $data['applications'] = ApplyProgram::where('staff_id', Auth::user()->id)->count();
        $data['acceptedApplications'] = ApplyProgram::where('staff_id', Auth::user()->id)->where('program_status', 1)->count();
        $data['rejectedApplications'] = ApplyProgram::where('staff_id', Auth::user()->id)->where('program_status', 3)->count();
        $data['application_list'] = ApplyProgram::where('staff_id', Auth::user()->id)->latest()->get();
        // return $data;
        return view('staff.dashboard', compact('data'));
    }

    public function student()
    {
        return view('staff.student');
    }

    public function studentGeneralDetails($user_id = null)
    {
        $countries = Country::all();
        $studentDetail = [];
        if ($user_id !== null) {
            $staff = Staff::whereUserId(Auth::user()->id)->first();
            $agentId = $staff->agent_id;
            $staffId = $staff->user_id;

            $studentDetail = StudentDetail::whereUserId($user_id)->where('agent_id', $agentId)->whereStaffId($staffId)->first();
        }
        // else {
        //     $studentDetail = StudentDetail::where('staff_id', Auth::user()->id)->first();
        // }
        // return $studentDetail;
        return view('staff.students.general', compact('studentDetail', 'countries'));
    }

    public function studentEducationHistory($user_id = null)
    {
        $countries = Country::all();
        $education_levels = EducationLevel::all();
        $gradingScheme = GradingScheme::all();
        if ($user_id !== null) {
            $staff = Staff::whereUserId(Auth::user()->id)->first();
            $agentId = $staff->agent_id;
            $staffId = $staff->user_id;

            $educationSummery = EducationSummary::whereUserId($user_id)->whereAgentId($agentId)->whereStaffId($staffId)->first();
        }
        return view('staff.students.education-history', compact('user_id', 'educationSummery', 'countries', 'education_levels', 'gradingScheme'));
    }

    public function studentTestScore($user_id = null)
    {
        return view('staff.students.test-score', compact('user_id'));
    }

    public function studentVisaPermit($user_id = null)
    {
        if ($user_id !== null) {
            $staff = Staff::whereUserId(Auth::user()->id)->first();
            $agentId = $staff->agent_id;
            $staffId = $staff->user_id;

            $visaPermit = VisaPermit::whereUserId($user_id)->whereAgentId($agentId)->whereStaffId($staffId)->first();
        }
        return view('staff.students.visa-permit', compact('user_id', 'visaPermit'));
    }

    public function program()
    {
        return view('staff.program');
    }

    public function profile()
    {
        $countries = Country::all();
        $profileDetail = Staff::whereUserId(Auth::user()->id)->first();
        return view('staff.profile', compact('countries', 'profileDetail'));
    }

    public function profileUpdate(Request $request)
    {
        // return $request->all();
        DB::beginTransaction();
        try {
            //code...
            $staff = Staff::whereUserId(Auth::user()->id)->first();
            $staff->update(request()->all());


            $user = User::whereId(Auth::user()->id)->first();
            $user->name = $request->name;
            $user->save();
            DB::commit();
            return redirect()->back()->with('success', 'Profile Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function paymentList()
    {
        $staffApply =  ApplyProgram::whereStatus(2)->whereStaffId(Auth::user()->id)->pluck('id');
        // return $staffApply;
        $staffPaymentDetails =  PaymentHistory::whereIn('program_id', $staffApply)->get();

        return view('staff.payment-list', compact('staffPaymentDetails'));
    }
}
