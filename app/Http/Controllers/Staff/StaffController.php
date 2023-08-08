<?php

namespace App\Http\Controllers\Staff;

use App\Models\Staff;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\GradingScheme;
use App\Models\EducationLevel;
use App\Models\Student\VisaPermit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentDetail;
use App\Models\Student\EducationSummary;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.dashboard');
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
}
