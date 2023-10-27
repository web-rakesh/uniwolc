<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProgramIntake;
use App\Models\EducationLevel;
use App\Models\PreModelQuestion;
use App\Models\ProgramPrePayment;
use App\Models\secondaryCategory;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProgramPreSubmission;
use App\Models\University\ProfileDetail;

class UniversityCourseController extends Controller
{
    public function universityCourseIndex()
    {
        return view('admin.university.course');
    }
    public function universityCourseCreate()
    {

        $currentDate = Carbon::now();
        $endDate = $currentDate->copy()->addYears(3);

        $months = [];
        while ($currentDate->lt($endDate)) {
            $months[$currentDate->format('Y-m-d')] = $currentDate->format('F Y');
            $currentDate->addMonth();
        }
        $preSubmissionModels = PreModelQuestion::all();
        $universities = ProfileDetail::all();
        $educationLevels = EducationLevel::all();
        $postCategories = secondaryCategory::all();
        return view('admin.university.course-create', compact('educationLevels', 'universities', 'months', 'postCategories', 'preSubmissionModels'));
    }
    public function universityCourseStore(Request $request)
    {
        // return $request;
        $egTest = [];
        foreach ($request->english_test ?? [] as $key => $value) {
            # code...
            if ($value != null) {

                $egTest[] = [$value => $request->total_score[$key]];
            }
        }
        // return $egTest ?  json_encode($egTest) : "";

        try {
            //code...
            $request['user_id'] = $request->university_id;
            $request['slug'] = Str::slug($request->program_title);
            // $request['program_till_date'] = json_encode($request->program_till_date);
            $request['english_test'] = $egTest ?  json_encode($egTest) : null;
            // return $request->all();
            DB::beginTransaction();

            $program = Program::Create($request->all());

            foreach ($request->intake_status as $key => $value) {
                ProgramIntake::create([
                    'program_id' => $program->id,
                    'intake_status' => $value,
                    'deadline' => $request->intake_deadline[$key],
                    'open_date' => $request->open_date[$key],
                    'intake_date' => $request->intake_date[$key],
                ]);
            }


            foreach ($request->payment_label ?? [] as $key => $value) {
                # code...
                if ($value != null) {

                    ProgramPrePayment::create([
                        'program_id' => $program->id,
                        'label' => $value,
                        'description' => $request->payment_description[$key],
                        'file' => $request->payment_file[$key] == 'file' ? 'file' : null,
                    ]);
                }
            }

            foreach ($request->submission_label ?? [] as $key => $value) {
                # code...
                if ($value != null) {

                    ProgramPreSubmission::create([
                        'program_id' => $program->id,
                        'label' => $value,
                        'description' => $request->submission_description[$key] ?? null,
                        'file' => $request->submission_file[$key] == 'file' ? 'file' : null,
                        'program_submission_model_id' => $request->submission_model[$key] ?? null,
                    ]);
                }
            }


            DB::commit();
            return redirect()->back()->with('success', 'Program Created Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
            return $th->getMessage();
        }
    }

    /**
     * admin able to edit university course
     */
    public function universityCourseEdit($id)
    {
        $currentDate = Carbon::now();
        $endDate = $currentDate->copy()->addYears(4);

        $months = [];
        while ($currentDate->lt($endDate)) {
            $months[$currentDate->format('Y-m-d')] = $currentDate->format('F Y');
            $currentDate->addMonth();
        }
        $program = Program::find($id);
        $universities = ProfileDetail::all();
        $educationLevels = EducationLevel::all();
        $postCategories = secondaryCategory::all();
        $preSubmissionModels = PreModelQuestion::all();
        // return $program->intake;
        return view('admin.university.course-edit', compact('program', 'educationLevels', 'universities', 'months', 'postCategories', 'preSubmissionModels'));
    }

    /**
     * admin able to update university course
     */

    public function universityCourseUpdate(Request $request, $id)
    {
        // return $request;
        try {

            $egTest = [];
            foreach ($request->english_test ?? [] as $key => $value) {
                # code...
                if ($value != null) {

                    $egTest[] = [$value => $request->total_score[$key]];
                }
            }
            //code...
            $request['user_id'] = $request->university_id;
            // $request['program_till_date'] = json_encode($request->program_till_date);
            $request['english_test'] = $egTest ?  json_encode($egTest) : null;
            // return $request->all();
            DB::beginTransaction();
            $program = Program::find($id);

            // Update the task with the validated data
            $program->update($request->all());
            ProgramIntake::where('program_id', $program->id)->delete();
            foreach ($request->intake_status as $key => $value) {
                ProgramIntake::create([
                    'program_id' => $program->id,
                    'intake_status' => $value,
                    'deadline' => $request->intake_deadline[$key],
                    'open_date' => $request->open_date[$key],
                    'intake_date' => $request->intake_date[$key],
                ]);
            }

            ProgramPrePayment::where('program_id', $program->id)->delete();
            foreach ($request->payment_label ?? [] as $key => $value) {
                # code...
                if ($value != null) {

                    ProgramPrePayment::create([
                        'program_id' => $program->id,
                        'label' => $value,
                        'description' => $request->payment_description[$key],
                        'file' => $request->payment_file[$key] == 'file' ? 'file' : null,
                    ]);
                }
            }
            ProgramPreSubmission::where('program_id', $program->id)->delete();
            foreach ($request->submission_label ?? [] as $key => $value) {
                # code...
                if ($value != null) {

                    ProgramPreSubmission::create([
                        'program_id' => $program->id,
                        'label' => $value,
                        'description' => $request->submission_description[$key] ?? null,
                        'file' => $request->submission_file[$key] == 'file' ? 'file' : null,
                        'program_submission_model_id' => $request->submission_model[$key] ?? null,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.university.course.view')->with('success', 'Program Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
            return $th->getMessage();
        }
    }
}
