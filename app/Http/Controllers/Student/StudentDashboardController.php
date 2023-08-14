<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student\StudentDetail;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $studentDetails = StudentDetail::where('user_id', auth()->user()->id)->first();
        return view('students.home', compact('studentDetails'));
    }
}
