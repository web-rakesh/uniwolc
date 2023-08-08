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
        return view('university.applicant-requirements');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // return $request->data;
        return view('university.applicant-requirement-create', ['data' => $request->data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicantRequirementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ApplicantRequirement $applicantRequirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApplicantRequirement $applicantRequirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicantRequirementRequest $request, ApplicantRequirement $applicantRequirement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicantRequirement $applicantRequirement)
    {
        //
    }
}
