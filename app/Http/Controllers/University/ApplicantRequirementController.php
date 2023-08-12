<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplicantRequirement;
use App\Http\Requests\StoreApplicantRequirementRequest;
use App\Http\Requests\UpdateApplicantRequirementRequest;

class ApplicantRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('university.apply-program-list',['status' => '']);
    }

    public function newApplication()
    {
        return view('university.apply-program-list', ['status' => 4]);
    }

    public function acceptedApplication()
    {
        return view('university.apply-program-list', ['status' => 1]);
    }

    public function rejectedApplication()
    {
        return view('university.apply-program-list' , ['status' => 3]);
    }
}
