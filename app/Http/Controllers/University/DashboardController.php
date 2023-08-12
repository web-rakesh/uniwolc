<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\University\Program;
use App\Http\Controllers\Controller;
use App\Models\AgentCommission;
use App\Models\Student\ApplyProgram;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['total_programs'] = Program::where('user_id', Auth::user()->id)->count();
        $data['today_programs'] = Program::where('user_id', Auth::user()->id)->whereDate('created_at', Carbon::today())->count();
        $data['total_approved_applications'] = ApplyProgram::where('university_id', Auth::user()->id)->count();
        $data['total_rejected_applications'] = ApplyProgram::where('university_id', Auth::user()->id)->where('program_status', 3)->count();
        $data['total_pending_applications'] = ApplyProgram::where('university_id', Auth::user()->id)->where('program_status', 1)->count();

        // return AgentCommission::
        $data['total_application_fee'] = ApplyProgram::where('university_id', Auth::user()->id)->sum('fees');
        $data['today_application_fee'] = ApplyProgram::where('university_id', Auth::user()->id)->whereDate('created_at', Carbon::today())->sum('fees');
        $data['total_apply_student'] = ApplyProgram::where('university_id', Auth::user()->id)->count('user_id');
        // return $data;
        return view('university.dashboard', compact('data'));
    }
}
