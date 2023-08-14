<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Student\TestScore;
use App\Models\Student\VisaPermit;
use App\Http\Controllers\Controller;
use App\Models\Student\ApplyProgram;
use App\Models\Student\StudentDetail;
use App\Models\Student\EducationSummary;
use App\Models\Student\ApplicantUploadDocument;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('admin.application.list',['label'=>'All Applications']);
    }

    public function newApplication()
    {
        return view('admin.application.list', ['status' => 0, 'label'=>'New Applications']);
    }

    public function acceptedApplication()
    {
        return view('admin.application.list', ['status' => 1 , 'label'=>'Accepted Applications']);
    }

    public function rejectedApplication()
    {
        return view('admin.application.list', ['status' => 3, 'label'=>'Rejected Applications']);
    }

    public function show($id)
    {


        $data['program'] = ApplyProgram::findOrFail($id);
        $userId = $data['program']->user_id;
        $programId = $data['program']->id;
        // return $programPrint->uploadedDocument->getMedia('program-student-attachment');
        // return $programPrint->getProgram;

        $data['student'] =   StudentDetail::whereUserId($userId)->firstOrFail();
        $data['education_summary']  =   EducationSummary::whereUserId($userId)->first();
        $data['test_score'] =   TestScore::whereUserId($userId)->first();
        $data['visa_permit'] =   VisaPermit::whereUserId($userId)->first();
        // return $programId;
        $data['upload_document'] = ApplicantUploadDocument::whereUserId($userId)->whereApplyProgramId($programId)->get();
        // return $data;
        return view('admin.application.show', compact('data'));
    }
}
