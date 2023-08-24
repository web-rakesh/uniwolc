<?php

namespace App\Http\Controllers\Agent;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\GradingScheme;
use App\Models\EducationLevel;
use App\Models\AgentCommission;
use App\Models\Student\VisaPermit;
use App\Http\Controllers\Controller;
use App\Models\Student\ApplyProgram;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentDetail;
use App\Models\Student\EducationSummary;

class AgentController extends Controller
{
    public function index()
    {
        $data['totalStudent'] = StudentDetail::where('agent_id', Auth::user()->id)->count();
        $data['applications'] = ApplyProgram::where('agent_id', Auth::user()->id)->count();
        $data['acceptedApplications'] = ApplyProgram::where('agent_id', Auth::user()->id)->where('program_status', 1)->count();
        $data['rejectedApplications'] = ApplyProgram::where('agent_id', Auth::user()->id)->where('program_status', 3)->count();
        $data['application_list'] = ApplyProgram::where('agent_id', Auth::user()->id)->latest()->get();
        return view('agent.dashboard', compact('data'));
    }

    public function staff()
    {
        return view('agent.staff');
    }

    public function student()
    {
        return view('agent.student');
    }

    public function studentExport()
    {
        return view('agent.student-list');
    }

    public function program()
    {
        return view('agent.program');
    }

    public function studentGeneralDetails($user_id = null)
    {
        // return $id;
        $countries = Country::all();
        $studentDetail = [];
        if ($user_id !== null) {

            $studentDetail = StudentDetail::whereUserId($user_id)->where('agent_id', Auth::user()->id)->first();
        }
        // else {
        //     $studentDetail = StudentDetail::where('agent_id', Auth::user()->id)->first();
        // }
        // return "work";
        return view('agent.students.general', compact('studentDetail', 'countries'));
    }

    public function studentEducationHistory($user_id = null)
    {
        $countries = Country::all();
        $education_levels = EducationLevel::all();
        $gradingScheme = GradingScheme::all();
        $educationSummery = EducationSummary::whereUserId($user_id)->where('agent_id', Auth::user()->id)->first();
        return view('agent.students.education-history', compact('user_id', 'educationSummery', 'countries', 'gradingScheme', 'education_levels'));
    }

    public function studentTestScore($user_id = null)
    {
        return view('agent.students.test-score', compact('user_id'));
    }

    public function studentVisaPermit($user_id = null)
    {
        $visaPermit = VisaPermit::whereUserId($user_id)->where('agent_id', Auth::user()->id)->first();
        return view('agent.students.visa-permit', compact('user_id', 'visaPermit'));
    }


    public function paymentHistory()
    {

        return view('agent.payment-history');
    }
}
