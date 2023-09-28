<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\ProgramIntake;
use Illuminate\Support\Carbon;
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
        // return els_intake("2023-10-8");
        // return "hello";
        $applyPrograms = ApplyProgram::whereUserId(Auth::user()->id)->where('status', 1)->latest()->get();
        // return $applyPrograms[0]->getUniversity->university_gallery_url;
        $applyProgramPaid = ApplyProgram::whereUserId(Auth::user()->id)->where('status', 2)->latest()->get();
        return view('students.application', compact('applyPrograms', 'applyProgramPaid'));

        // return view('students.apply', compact('program'));
    }

    public function applicationFillup($slug)
    {
        $applyProgram = ApplyProgram::whereUserId(Auth::user()->id)->where('slug', $slug)->first();
        $studentDetail = StudentDetail::whereUserId(Auth::user()->id)->first();
        $uploadedDocument = ApplicantUploadDocument::whereUserId(Auth::user()->id)->whereApplyProgramId($applyProgram->id)->get();
        $intakeProgram = ProgramIntake::whereProgramId($applyProgram->program_id)->whereId($applyProgram->intake)->first();
        $layout = auth_layout();
        return view('students.application-fillup', compact('layout', 'applyProgram', 'studentDetail', 'uploadedDocument', 'intakeProgram'));
    }

    public function applicationProgramBackup(Request $request)
    {
        // return $request->all();
        $applyProgram =  ApplyProgram::where('id', $request->id)->first();
        $program = Program::where('id', $applyProgram->program_id)->first();
        $allProgram = Program::where('id', '!=', $applyProgram->program_id)->where('user_id', $program->user_id)->get();
        $backupProgram = json_decode($applyProgram->backup_program, true);
        return response()->json(['allProgram' => $allProgram, 'backupProgram' => $backupProgram]);
    }

    public function applicationProgramBackupStore(Request $request)
    {
        // return $request->all();
        $applyProgram =  ApplyProgram::where('id', $request->programId)->first();
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
        $intakeProgram = ProgramIntake::whereProgramId($applyProgram->program_id)->whereId($applyProgram->intake)->first();
        $layout = auth_layout();
        return view('students.application-fillup', compact('layout', 'applyProgram', 'studentDetail', 'uploadedDocument', 'intakeProgram'));



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
        $intakeProgram = ProgramIntake::whereProgramId($applyProgram->program_id)->whereId($applyProgram->intake)->first();
        $layout = auth_layout();
        return view('students.application-fillup', compact('layout', 'applyProgram', 'studentDetail', 'uploadedDocument', 'intakeProgram'));




        return view('agent.application.application-fillup', compact('applyProgram', 'studentDetail', 'uploadedDocument'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function agentStaffApplication(Request $request)
    {
        // return $request;
        // return $applyPrograms[0]->getProgram;
        if (Auth::user()->type == 'agent') {
            $programStatus = 0;
            if ($request->status == 'accepted') {
                $programStatus = 1;
            } elseif ($request->status == 'rejected') {
                $programStatus = 3;
            } else {
                $programStatus = 0;
            }
            // return $programStatus;
            // return view('staff.application.application', ['applications' => 1]);
            // return view('agent.application.application', compact('applyPrograms',));
            return view('agent.application.application', ['applications' => 1, 'programStatus' => $programStatus]);
        } elseif (Auth::user()->type == 'staff') {
            $programStatus = 0;
            if ($request->status == 'accepted') {
                $programStatus = 1;
            } elseif ($request->status == 'rejected') {
                $programStatus = 3;
            } else {
                $programStatus = 0;
            }
            // return $programStatus;
            return view('staff.application.application', ['applications' => 1, 'programStatus' => $programStatus]);
        }
        // return view('staff.application.application', compact('applyPrograms', 'applyProgramPaid'));
    }

    public function agentStaffPaidApplication()
    {

        // return "paid application";
        // return $applyPrograms[0]->getProgram;
        if (Auth::user()->type == 'agent') {
            $applyProgramPaid = ApplyProgram::whereAgentId(Auth::user()->id)->where('status', 2)->get();
            return view('agent.application.paid-application', ['applications' => 2, 'applyProgramPaid' => $applyProgramPaid]);
        } elseif (Auth::user()->type == 'staff') {
            return view('staff.application.application', ['applications' => 2]);
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

    public function schoolDetails($id, $slug)
    {
        // return $id;
        // return $slug;
        $schoolDetails = ProfileDetail::whereId($id)->where('slug', $slug)->first();
        // $schoolDetails = ProfileDetail::find($slug);
        $universityImage = $schoolDetails->getMedia('university-picture');
        if (Auth::user()->type == 'agent') {
            return view('agent.school-details', compact('schoolDetails', 'universityImage'));
        } elseif (Auth::user()->type == 'staff') {
            return view('staff.school-details', compact('schoolDetails', 'universityImage'));
        } else {
            return view('students.school-details', compact('schoolDetails', 'universityImage'));
        }




        $applyProgram = ApplyProgram::whereAgentId(Auth::user()->id)->where('university_id', $id)->get();
    }

    public function applicationAcademicSession(Request $request)
    {
        // return $request->all();
        try {
            //code...
            $applyProgram = ApplyProgram::where('id', $request->id)->first();
            $applyProgram->start_date = $request->date;
            $applyProgram->save();
            return response()->json(['success' => 'Academic Session Changed Successfully']);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    // application record and note section
    public function applicationRecordNote(Request $request)
    {
        // return $request->all();
        $applyProgram = ApplyProgram::whereUserId(Auth::user()->id)->where('id', $request->id)->first();
        if ($request->action == 'open' && $request->mode == 'note') {
            $note =  $applyProgram->student_note ?? '';
            return response()->json(['mode' => 'note', 'action' => 'open', 'note' => $note, 'success' => 'Note Open Successfully']);
        }
        if ($request->action == 'open' && $request->mode == 'student-record') {
            $note =  $applyProgram->student_record ?? '';
            return response()->json(['mode' => 'student-record', 'action' => 'open', 'note' => $note, 'success' => 'Note Open Successfully']);
        }
        // return $request->all();
        // return "error";
        try {
            //code...
            if ($request->action == 'store' && $request->mode == 'note') {
                $applyProgram->student_note = $request->editor;
                $applyProgram->save();
                return response()->json(['modal' => 'off', 'success' => 'Note store Successfully']);
            }
            if ($request->action == 'store' && $request->mode == 'student-record') {

                $applyProgram->student_record = $request->editor;
                $applyProgram->save();
                return response()->json(['modal' => 'off', 'success' => 'Note student record Successfully']);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }


    public function intakeProgramUpdate(Request $request)
    {
        // return $request;

        // return $request->all();
        try {
            //code...
            $intake_date = ProgramIntake::where('program_id', $request->program_id)->where('id', $request->intake_id)->first();
            // return $intake_date->intake_date;
            $els_intake = els_intake($intake_date->intake_date) ?? null;
            $els_intake_option = '';
            $els_intake_start_date = null;
            $c = 0;
            foreach ($els_intake as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    if ($c == 0) {
                        $els_intake_start_date = $key1;
                    }
                    $c++;
                    $els_intake_option .= '<option value="' . $key1 . '">' . $value1 . '</option>';
                }
            }
            // return $els_intake_start_date;
            if ($request->els_intake) {
                $els_intake_start_date = $request->els_intake;
            }
            if ($request->mood != 'change_intake') {
                ApplyProgram::whereUserId(Auth::user()->id)->where('program_id', $request->program_id)->first()->update([
                    'intake' => $request->intake_id,
                    'esl_start_date' => $els_intake_start_date,
                ]);
            }
            return response()->json([
                'success' => 'Intake Updated Successfully',
                'els_intake' => $els_intake_option,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function elsIntakeProgramUpdate(Request $request)
    {
        try {
            //code...
            ApplyProgram::whereUserId(Auth::user()->id)->where('program_id', $request->program_id)->first()->update([
                'esl_start_date' => $request->els_intake,
            ]);
            return response()->json([
                'success' => 'Intake Updated Successfully',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'error' => 'Something went wrong',
            ]);
        }
    }

    public function programReject(Request $request)
    {
        // return $request;
        $rejectNote = ApplyProgram::select('id','remark')->where('id', $request->program_id)->first();
        return response()->json(['rejectNote' => $rejectNote]);
    }
}
