<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Student\ApplyProgram;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentDetail;
use App\Models\University\ProfileDetail;
use App\Http\Requests\StoreApplyProgramRequest;
use App\Models\Student\ApplicantUploadDocument;
use App\Http\Requests\UpdateApplyProgramRequest;

class ApplyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applyPrograms = ApplyProgram::whereUserId(Auth::user()->id)->where('status', 1)->get();
        $applyProgramPaid = ApplyProgram::whereUserId(Auth::user()->id)->where('status', 2)->get();
        return view('students.application', compact('applyPrograms', 'applyProgramPaid'));

        // return view('students.apply', compact('program'));
    }

    public function applicationFillup($id)
    {
        $applyProgram = ApplyProgram::whereUserId(Auth::user()->id)->where('slug', $id)->first();
        $studentDetail = StudentDetail::whereUserId(Auth::user()->id)->first();
        $uploadedDocument = ApplicantUploadDocument::whereUserId(Auth::user()->id)->whereApplyProgramId($id)->get();
        return view('students.application-fillup', compact('applyProgram', 'studentDetail', 'uploadedDocument'));
    }

    public function applicationProgramBackup(Request $request)
    {
        // return $request->all();
        $applyProgram =  ApplyProgram::whereUserId(Auth::user()->id)->where('id', $request->id)->first();
        $program = Program::where('id', $applyProgram->program_id)->first();
        $allProgram = Program::where('id', '!=', $applyProgram->program_id)->where('user_id', $program->user_id)->get();
        $backupProgram = json_decode($applyProgram->backup_program, true);
        return response()->json(['allProgram' => $allProgram, 'backupProgram' => $backupProgram]);
    }

    public function applicationProgramBackupStore(Request $request)
    {
        // return $request->all();
        $applyProgram =  ApplyProgram::whereUserId(Auth::user()->id)->where('id', $request->programId)->first();
        $applyProgram->backup_program = json_encode($request->backupProgramId);
        $applyProgram->save();
        return response()->json(['success' => 'Program Changed Successfully']);
    }

    public function applicationStaffFillup($slug)
    {
        $applyProgram = ApplyProgram::whereStaffId(Auth::user()->id)->where('slug', $slug)->first();
        $studentDetail = StudentDetail::whereUserId($applyProgram->user_id)->first();
        $uploadedDocument = ApplicantUploadDocument::whereUserId($applyProgram->user_id)->whereApplyProgramId($applyProgram->id)->get();
        return view('staff.application.application-fillup', compact('applyProgram', 'studentDetail', 'uploadedDocument'));
    }

    public function applicationAgentFillup($slug)
    {

        $applyProgram = ApplyProgram::whereAgentId(Auth::user()->id)->where('slug', $slug)->first();
        $studentDetail = StudentDetail::whereUserId($applyProgram->user_id)->first();
        $uploadedDocument = ApplicantUploadDocument::whereUserId($applyProgram->user_id)->whereApplyProgramId($applyProgram->id)->get();
        return view('agent.application.application-fillup', compact('applyProgram', 'studentDetail', 'uploadedDocument'));
    }

    public function agentStaffViewApplication($slug)
    {
        $applyProgram = ApplyProgram::whereAgentId(Auth::user()->id)->where('slug', $slug)->first();
        $studentDetail = StudentDetail::whereUserId($applyProgram->user_id)->first();
        $uploadedDocument = ApplicantUploadDocument::whereUserId($applyProgram->user_id)->whereApplyProgramId($applyProgram->id)->get();
        return view('agent.application.application-fillup', compact('applyProgram', 'studentDetail', 'uploadedDocument'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function agentStaffApplication()
    {

        // return $applyPrograms[0]->getProgram;
        if (Auth::user()->type == 'agent') {
            $applyPrograms = ApplyProgram::whereAgentId(Auth::user()->id)->where('status', 1)->get();
            return view('agent.application.application', compact('applyPrograms',));
        } elseif (Auth::user()->type == 'staff') {
            $applyPrograms = ApplyProgram::whereStaffId(Auth::user()->id)->where('status', 1)->get();
            $applyProgramPaid = ApplyProgram::whereStaffId(Auth::user()->id)->where('status', 2)->get();
            return view('staff.application.application', compact('applyPrograms', 'applyProgramPaid'));
        }
        return view('staff.application.application', compact('applyPrograms', 'applyProgramPaid'));
    }

    public function agentStaffPaidApplication()
    {

        // return $applyPrograms[0]->getProgram;
        if (Auth::user()->type == 'agent') {
            $applyProgramPaid = ApplyProgram::whereAgentId(Auth::user()->id)->where('status', 2)->get();
            return view('agent.application.paid-application', compact('applyProgramPaid'));
        } elseif (Auth::user()->type == 'staff') {
            $applyProgramPaid = ApplyProgram::whereStaffId(Auth::user()->id)->where('status', 2)->get();
            return view('staff.application.application', compact('applyProgramPaid'));
        }
        return view('staff.application', compact('applyPrograms', 'applyProgramPaid'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplyProgramRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ApplyProgram $applyProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApplyProgram $applyProgram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplyProgramRequest $request, ApplyProgram $applyProgram)
    {
        //
    }
    public function applicantStatusUpdate(Request $request)
    {
        // return $request->all();
        return $applyProgram = ApplyProgram::whereId($request->apply_program_id)->update(['application_status' => 1]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $applyProgram = ApplyProgram::whereUserId(Auth::user()->id)->whereId($id)->first();
        $applyProgram->delete();
        return redirect()->back()->with('success', 'Program deleted successfully');
    }

    public function applicantDocumentUpload(Request $request)
    {
        DB::beginTransaction();
        try {
            //code...

            if (Auth::user()->type == 'agent') {
                $request['user_id'] = $request->student_id;
                $request->request->remove('student_id');
            } elseif (Auth::user()->type == 'staff') {
                $request['user_id'] = $request->student_id;
                $request->request->remove('student_id');
            } else {
                $request['user_id'] = Auth::user()->id;
            }

            $uploadFile = ApplicantUploadDocument::Create($request->all());

            if ($request->has('documentUpload')) {
                $uploadFile->addMedia($request->documentUpload)->toMediaCollection($request->document_name);
            }
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();

            return $th->getMessage();
        }
    }

    public function applicantDocumentDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            //code...
            // return $request->all();
            $uploadFile = ApplicantUploadDocument::whereUserId(Auth::user()->id)->where('id', $request->id)->first();
            if ($uploadFile->document_name !== null) {
                $uploadFile->clearMediaCollection($uploadFile->document_name);
            }
            $uploadFile->delete();

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();

            return $th->getMessage();
        }
    }

    public function schoolDetails($slug)
    {
        // return $slug;
        $schoolDetails = ProfileDetail::where('slug', $slug)->first();
        // $schoolDetails = ProfileDetail::find($slug);
        $universityImage = $schoolDetails->getMedia('university-picture');
        return view('students.school-details', compact('schoolDetails', 'universityImage'));
    }
}
