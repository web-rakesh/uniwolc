<?php

namespace App\Http\Controllers\Student;

use PDF;
use App\Models\User;
use App\Models\Staff;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\AgentCommission;
use App\Models\Student\TestScore;
use App\Models\Student\VisaPermit;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Student\ApplyProgram;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Student\StudentDetail;
use App\Models\Student\EducationSummary;
use App\Models\University\ProfileDetail;
use App\Models\Student\ApplicantUploadDocument;
use App\Http\Requests\StoreStudentDetailRequest;
use App\Http\Requests\UpdateStudentDetailRequest;

class StudentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentDetail = StudentDetail::whereUserId(Auth::user()->id)->first() ?? null;
        $countries = Country::all();
        return view('students.profile-edit', compact('studentDetail', 'countries'));
    }

    public function profile()
    {
        $studentDetail = StudentDetail::whereUserId(Auth::user()->id)->first() ?? null;
        return view('students.profile', compact('studentDetail'));
    }

    public function program()
    {
        return view('students.programs');
    }

    public function programDetail($slug)
    {
        $program = Program::where('slug', $slug)->first();
        $relatedPrograms = Program::select('id', 'slug', 'program_title')->where('id', '!=', $program->id)->limit(5)->latest()->get();
        $university = ProfileDetail::where('user_id', $program->user_id)->first();
        $universityImage = $university->getMedia('university-picture');
        if (Auth::user()->type == 'agent') {

            $students = StudentDetail::select('id', 'user_id', 'first_name', 'last_name')->latest()->get();
            return view('agent.program-detail', compact('program', 'universityImage', 'university', 'relatedPrograms', 'students'));
        } elseif (Auth::user()->type == 'staff') {

            $students = StudentDetail::select('id', 'user_id', 'first_name', 'last_name')->latest()->get();
            return view('staff.program-detail', compact('program', 'universityImage', 'university', 'relatedPrograms', 'students'));
        } else {
            return view('students.program-detail', compact('program', 'universityImage', 'university', 'relatedPrograms'));
        }
    }

    public function programApply(Program $program)
    {
        // return now();
        // return $program;

        if (ApplyProgram::where('slug', $program->slug)->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->route('student.application.index')->with('message', 'You have already applied for this program.');
        } else {

            ApplyProgram::create([
                'user_id' => Auth::user()->id,
                'program_id' => $program->id,
                'slug' => $program->slug,
                'application_number' => 'UW' . rand(100000, 999999),
                'program_title' => $program->program_title,
                'fees' => $program->application_fee,
                'esl_start_date' => now(),
                'start_date' => now(),

            ]);
            return redirect()->route('student.application.index')->with('message', 'You have successfully applied for this program.');
        }


        return redirect()->route('student.application.index');


        return view('students.apply', compact('program'));
    }

    /**
     * Store a newly apply program agent and staff.
     */
    public function agentProgramApply(Request $request, Program $program)
    {
        // return $program;

        if ($request->user_id == null) {
            return redirect()->back()->with('error', 'Please select student.');
        }
        $studentDetail = StudentDetail::select('id', 'user_id')->whereUserId($request->user_id)->first();

        // return ApplyProgram::where('id', $program->id)->whereUserId($studentDetail->user_id)->count();

        if (ApplyProgram::where('id', $program->id)->whereUserId($studentDetail->user_id)->count() > 0) {

            return redirect()->route('staff.program.detail', $program->slug)->with('error', 'Student has already applied for this program.');
        } else {
            // return "else";
            $agentId = null;
            $staffId = null;
            if (Auth::user()->type == 'staff') {
                $staff = Staff::whereUserId(Auth::user()->id)->first();
                $agentId = $staff->agent_id;
                $staffId = $staff->user_id;
            }
            if (Auth::user()->type == 'agent') {

                $agentId = Auth::user()->id;
                $staffId = null;
            }
            try {
                //code...

                DB::beginTransaction();
                $applyPGrm = ApplyProgram::create([
                    'user_id' => $studentDetail->user_id,
                    'program_id' => $program->id,
                    'slug' => $program->slug,
                    'application_number' => 'UW' . rand(100000, 999999),
                    'program_title' => $program->program_title,
                    'fees' => $program->application_fee,
                    'esl_start_date' => now(),
                    'start_date' => now(),
                    'agent_id' => $agentId,
                    'staff_id' => $staffId,

                ]);

                $agentCommissionAmount = 0;
                if ($program->application_fee > 0) {
                    $agentCommissionAmount = ($program->agent_commission / 100) * $program->application_fee;
                }
                AgentCommission::create([
                    'agent_id' => $agentId,
                    'program_id' => $program->id,
                    'apply_program_id' => $applyPGrm->id,
                    'apply_program_id' => $program->user_id,
                    'program_fees' => $program->application_fee,
                    'amount' => $agentCommissionAmount,
                    'commission' => $program->agent_commission,

                ]);
                DB::commit();
                if (Auth::user()->type == 'staff') {
                    return redirect()->route('staff.application')->with('message', 'You have successfully applied for this program.');
                } elseif (Auth::user()->type == 'agent') {
                    return redirect()->route('agent.application')->with('message', 'You have successfully applied for this program.');
                }
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollback();
                return redirect()->back()->with('error', $th->getMessage());
            }
            // return redirect()->route('student.application.index');
        }


        return redirect()->route('student.application.index');


        return view('students.apply', compact('program'));
    }

    public function studentProgramPrint($user_id)
    {

        $data['program'] = ApplyProgram::whereSlug($user_id)->first();
        $userId = $data['program']->user_id;
        $programId = $data['program']->id;
        // return $programPrint->uploadedDocument->getMedia('program-student-attachment');
        // return $programPrint->getProgram;

        $data['student'] =   StudentDetail::whereUserId($userId)->firstOrFail();
        $data['education_summary']  =   EducationSummary::whereUserId($userId)->first();
        $data['test_score'] =   TestScore::whereUserId($userId)->first();
        $data['visa_permit'] =   VisaPermit::whereUserId($userId)->first();
        // return $data;
        $uploadedDocument = ApplicantUploadDocument::whereUserId($userId)->whereApplyProgramId($programId)->get();
        if (Auth::user()->type == 'agent') {
            return view('agent.print', compact('data', 'uploadedDocument'));
        } elseif (Auth::user()->type == 'student') {
            // return $data;
            return view('students.print', compact('data', 'uploadedDocument'));
        }
        // return view('agent.print', compact('data', 'uploadedDocument'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentDetailRequest $request)
    {
        // return $request->all();
        // return $request->user_id;
        try {
            //code...
            DB::beginTransaction();
            $studentEmail = Auth::user()->email;
            $userId = Auth::user()->id;
            $redirectUrl = null;
            if (Auth::user()->type == 'agent') {
                if ($request->user_id != null) {
                    $student = StudentDetail::whereUserId($request->user_id)->whereAgentId(Auth::user()->id)->first();
                    $userId = $student->user_id;
                } else {
                    $student = User::create([
                        'name' => $request->first_name . ' ' . $request->last_name,
                        'email' => $request->email,
                        'password' => Hash::make('password'),
                    ]);
                    $userId = $student->id;
                }

                $request['agent_id'] = Auth::user()->id;
                $request['user_id'] = $userId;
                $userId = $userId;
                $studentEmail = $student->email;
                $redirectUrl = 'agent.student';
            } elseif (Auth::user()->type == 'staff') {
                $staff = Staff::whereUserId(Auth::user()->id)->first();
                $agentId = $staff->agent_id;
                $staffId = $staff->user_id;
                if ($request->user_id != null) {
                    return "Asda";
                    $student = StudentDetail::whereUserId($request->user_id)->whereAgentId($agentId)->whereStaffId($staffId)->first();
                    $userId = $student->user_id;
                } else {
                    $student = User::create([
                        'name' => $request->first_name . ' ' . $request->last_name,
                        'email' => $request->email,
                        'password' => Hash::make('password'),
                    ]);
                    $userId = $student->id;
                }

                $request['agent_id'] = $agentId;
                $request['staff_id'] = $staffId;
                $request['user_id'] = $userId;
                $userId = $userId;
                $redirectUrl = 'staff.student';
            } else {
                $request['user_id'] = Auth::user()->id;
                $redirectUrl = 'student.student-detail.index';
            }
            // return $request->all();
            // exit;

            StudentDetail::updateOrCreate(
                [
                    'user_id' => $userId,
                    // 'email' =>  $studentEmail
                ],
                $request->all()
            );
            DB::commit();
            return redirect()->route($redirectUrl)->with('message', 'Student detail saved successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentDetail $studentDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentDetail $studentDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentDetailRequest $request, StudentDetail $studentDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentDetail $studentDetail)
    {
        //
    }
}
