<?php

namespace App\Http\Controllers\Student;

use PDF;
use App\Models\User;
use App\Models\Staff;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\GradingScheme;
use App\Models\ProgramIntake;
use App\Models\AgentCommission;
use App\Models\secondaryCategory;
use App\Models\Student\TestScore;
use App\Models\Student\VisaPermit;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Student\ApplyProgram;
use App\Models\WizardQuestionAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CategoriesOfEducation;
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
        $countries = Country::where('block', '!=', 1)->get();
        return view('students.profile-edit', compact('studentDetail', 'countries'));
    }

    public function profile()
    {
        $studentDetail = StudentDetail::whereUserId(Auth::user()->id)->first() ?? null;
        return view('students.profile', compact('studentDetail'));
    }

    public function program()
    {
        $countries = Country::where('block', '!=', 1)->get();
        $secondaryCategories = secondaryCategory::all();
        $educationLevels = CategoriesOfEducation::with('educationLevels')->get();
        $programs = Program::latest()->paginate(10);
        $programCount = Program::count();
        $schoolCount = ProfileDetail::count();
        $schools = ProfileDetail::select('id', 'university_name')->latest()->get();
        $schoolLists = ProfileDetail::latest()->take(30)->get();



        $quick_data = [
            'quick_search' => true,
            'nationality' => '',
            'residence' => '',
            'state' => '',
            'visa' => '',
            'countryEducation' => '',
        ];


        return view(
            'students.quick_search.quick-search',
            compact(
                'programs',
                'programCount',
                'schoolCount',
                'secondaryCategories',
                'countries',
                'educationLevels',
                'schools',
                'schoolLists',
                'quick_data'
            )
        );
    }

    public function quickSearch()
    {


        $countries = Country::where('block', '!=', 1)->get();
        $gradingSchemeAll = GradingScheme::all();
        $secondaryCategories = secondaryCategory::all();
        $educationLevels = CategoriesOfEducation::with('educationLevels')->get();
        $programs = Program::latest()->paginate(10);
        $programCount = Program::count();
        $schoolCount = ProfileDetail::count();
        $schools = ProfileDetail::select('id', 'university_name')->latest()->get();
        $schoolLists = ProfileDetail::latest()->take(30)->get();

        $quick_education_country =  WizardQuestionAnswer::where('screen_id', 1)
            ->where('student_id', Auth::user()->id)->pluck('answer_value')->toArray();
        $apply_education_label =  WizardQuestionAnswer::where('screen_id', 2)
            ->where('student_id', Auth::user()->id)->pluck('answer_value');
        $apply_intake =  WizardQuestionAnswer::where('screen_id', 4)
            ->where('student_id', Auth::user()->id)->pluck('answer_value')->toArray();

        $nationality =   WizardQuestionAnswer::select('answer_from_category', 'answer_from_subcategory', 'answer_from_table', 'answer_value_from_table')
            ->where('screen_id', 7)
            ->where('student_id', Auth::user()->id)->first()->answer_value_from_table;
        $residence =   WizardQuestionAnswer::select('answer_from_category', 'answer_from_subcategory', 'answer_from_table', 'answer_value_from_table')
            ->where('screen_id', 8)
            ->where('student_id', Auth::user()->id)->first()->answer_value_from_table;
        $state =   WizardQuestionAnswer::select('answer_from_category', 'answer_from_subcategory', 'answer_from_table', 'answer_value_from_table')
            ->where('screen_id', 9)
            ->where('student_id', Auth::user()->id)->first()->answer_value_from_table;

        $visa =   WizardQuestionAnswer::select('answer_from_category', 'answer_from_subcategory', 'answer_from_table', 'answer_value', 'answer_value_from_table')
            ->where('screen_id', 10)
            ->where('student_id', Auth::user()->id)->first()->answer_value;

        $countryEducation =   WizardQuestionAnswer::select('answer_from_category', 'answer_from_subcategory', 'answer_from_table', 'answer_value_from_table')
            ->where('screen_id', 11)
            ->where('answer_from_table', 'countries')
            ->where('student_id', Auth::user()->id)->first()->answer_value_from_table;

        $levelOfEducations =   WizardQuestionAnswer::select('answer_from_category', 'answer_from_subcategory', 'answer_from_table', 'answer_value_from_table')
            ->where('screen_id', 11)
            ->where('answer_from_table', 'level_of_educations')
            ->where('student_id', Auth::user()->id)->first()->answer_value_from_table ?? '11';

        $gradingSchemes =   WizardQuestionAnswer::select('answer_from_category', 'answer_from_subcategory', 'answer_from_table', 'answer_value_from_table')
            ->where('screen_id', 11)
            ->where('answer_from_table', 'grading_schemes')
            ->where('student_id', Auth::user()->id)->first()->answer_value_from_table ?? '11';
        $englishTest =   WizardQuestionAnswer::select('answer_from_category', 'answer_from_subcategory', 'answer_from_table', 'answer_value_from_table', 'answer_value')
            ->where('screen_id', 13)
            ->where('student_id', Auth::user()->id)->first();


        $quick_data = [
            'quick_education_country' => @$quick_education_country,
            'apply_education_label' => @$apply_education_label,
            'apply_intake' => @$apply_intake,
            'nationality' => @$nationality,
            'residence' => @$residence,
            'state' => @$state,
            'visa' => @$visa,
            'countryEducation' => @$countryEducation,
            'englishTest' => @$englishTest->answer_value,
            'levelOfEducations' => @$levelOfEducations,
            'gradingSchemes' => @$gradingSchemes,
        ];


        return view(
            'students.quick_search.quick-search',
            compact(
                'programs',
                'programCount',
                'schoolCount',
                'countries',
                'educationLevels',
                'secondaryCategories',
                'gradingSchemeAll',
                'schools',
                'schoolLists',
                'quick_data'
            )
        );
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
        // return $program->intake;

        $currentDateValue = now()->toDateString(); // Get the current date

        $pgIntake = ProgramIntake::where('program_id', $program->id)->whereDate('intake_date', '>', $currentDateValue)->first();
        if (empty($pgIntake)) {
            return redirect()->back()->with('error', 'Intake date is not available.');
        }
        // return $pgIntake;
        if (ApplyProgram::where('slug', $program->slug)->where('user_id', Auth::user()->id)->exists()) {
            return redirect()->route('student.application.index')->with('message', 'You have already applied for this program.');
        } else {

            ApplyProgram::create([
                'user_id' => Auth::user()->id,
                'program_id' => $program->id,
                'university_id' => $program->user_id,
                'slug' => $program->slug,
                'application_number' => 'UW' . rand(100000, 999999),
                'program_title' => $program->program_title,
                'fees' => $program->application_fee,
                'intake' => $pgIntake->id,
                'esl_start_date' => array_keys(els_intake($pgIntake->intake_date)[0])[0],
                // 'start_date' => now(),

            ]);
            return redirect()->route('student.application.index')->with('message', 'You have successfully applied for this program.');
        }


        return redirect()->route('student.application.index');


        return view('students.apply', compact('program'));
    }

    /**
     * Store a newly apply program agent and staff.
     */
    public function agentProgramApply(Request $request)
    {

        // return $request;
        $program = Program::find($request->program_id);
        if ($request->user_id == null) {
            return redirect()->back()->with('error', 'Please select student.');
        }
        $currentDateValue = now()->toDateString(); // Get the current date

        $pgIntake = ProgramIntake::where('program_id', $program->id)->whereDate('intake_date', '>', $currentDateValue)->first();
        if (empty($pgIntake)) {
            return redirect()->back()->with('error', 'Intake date is not available.');
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
                    'university_id' => $program->user_id,
                    'slug' => $program->slug,
                    'application_number' => 'UW' . rand(100000, 999999),
                    'program_title' => $program->program_title,
                    'fees' => $program->application_fee,
                    'intake' => $pgIntake->id,
                    'esl_start_date' => array_keys(els_intake($pgIntake->intake_date)[0])[0],
                    // 'start_date' => now(),
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
                    'student_id' => $studentDetail->user_id,
                    'apply_program_id' => $applyPGrm->id,
                    'country_id' => $program->university->country,
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
        } elseif (Auth::user()->type == 'staff') {
            return view('staff.print', compact('data', 'uploadedDocument'));
            // return $data;

        } else {

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
                    // return "Asda";
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
            $request['student_id'] = "100000$userId";
            // $request['student_id'] = get_student_id($userId);
            StudentDetail::updateOrCreate(
                [
                    'user_id' => $userId,
                    // 'email' =>  $studentEmail
                ],
                $request->all()
            );
            DB::commit();
            return redirect()->route($redirectUrl)->with('success', 'Student detail saved successfully.');
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

    public function studentPrivacyStatement($id, $slug)
    {
        // return $id.' '.$slug;
        $studentPrivacy = ProfileDetail::select('id', 'university_name')->whereId($id)->whereSlug($slug)->first();
        $image = $studentPrivacy->university_gallery_url;
        $base_url = url('/');
        $imageFile = str_replace($base_url, '', $image);
        $pdf = PDF::loadView('myPDF', [
            'title' => $studentPrivacy->university_name,
            'profile_image' => $imageFile
        ]);

        return $pdf->stream();
        // return $pdf->download('sample-with-image.pdf');
    }

    public function studentProgramEligibility(Request $request)
    {
        $isProfile = User::select('id', 'profile_is_updated', 'name')->where('id', $request->student_id)->first();
        if ($isProfile->profile_is_updated == 0) {
            return response()->json([
                'student_name' => "[$isProfile->id] $isProfile->name",
                'profile_url' => route('agent.student.general.detail', $isProfile->id),
                'error_profile' => "We are unable to determine the student's eligibility for this program. Please update the student's profile data in order to apply.",
                'status' => false
            ]);
        }

        $applyProgram = ApplyProgram::where('program_id', $request->program_id)->where('user_id', $request->student_id)->first();
        if ($applyProgram) {
            return response()->json([
                'student_name' => "[$isProfile->id] $isProfile->name",
                'error' => "Student has already applied for this program.",
                'status' => false
            ]);
        }

        return response()->json([
            'student_name' => "[$isProfile->id] $isProfile->name",
            'success' => "Student is eligible for this program.",
            'status' => true
        ]);
    }

    public function programEligibility(Request $request)
    {
        // return $request;

        $program = Program::select('id', 'program_title')->where('id', $request->programId)->first();
        return response()->json([
            'program_id' => $program->id,
            'program_title' => $program->program_title,
            'status' => true
        ]);
    }
}
