<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WizardQuestionAnswer;
use App\Models\Student\StudentDetail;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $studentDetails = StudentDetail::where('user_id', auth()->user()->id)->first();

        $eligibility = WizardQuestionAnswer::where('student_id', auth()->user()->id)->where('screen_id', '14')->first();
        return view('students.home', compact('studentDetails', 'eligibility'));
    }
}
