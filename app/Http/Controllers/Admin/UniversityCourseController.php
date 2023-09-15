<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProgramIntake;
use App\Models\EducationLevel;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\University\ProfileDetail;

class UniversityCourseController extends Controller
{
    public function universityCourseIndex()
    {
        return view('admin.university.course');
    }
    public function universityCourseCreate()
    {
        $universities = ProfileDetail::all();
        $educationLevels = EducationLevel::all();
        return view('admin.university.course-create', compact('educationLevels', 'universities'));
    }
    public function universityCourseStore(Request $request)
    {
        // return $request;

        try {
            //code...
            $request['user_id'] = $request->university_id;
            $request['slug'] = Str::slug($request->program_title);
            // $request['program_till_date'] = json_encode($request->program_till_date);
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

            if ($request->has('student_attachment')) {
                foreach ($request->student_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-student-attachment');
                }
            }
            if ($request->has('copy_passport_attachment')) {
                foreach ($request->copy_passport_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-passport-attachment');
                }
            }
            if ($request->has('custodianship_declaration_attachment')) {
                foreach ($request->custodianship_declaration_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-custodianship-declaration-attachment');
                }
            }
            if ($request->has('proof_immunization_attachment')) {
                foreach ($request->proof_immunization_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-proof-immunization-attachment');
                }
            }
            if ($request->has('participation_agreement_attachment')) {
                foreach ($request->participation_agreement_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-participation-agreement-attachment');
                }
            }
            if ($request->has('self_introduction_attachment')) {
                foreach ($request->self_introduction_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-self-introduction-attachment');
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
        $program = Program::find($id);
        $universities = ProfileDetail::all();
        $educationLevels = EducationLevel::all();
        return view('admin.university.course-edit', compact('program', 'educationLevels', 'universities'));
    }

    /**
     * admin able to update university course
     */

    public function universityCourseUpdate(Request $request, $id)
    {
        // return $request;
        try {
            //code...
            $request['user_id'] = $request->university_id;
            $request['program_till_date'] = json_encode($request->program_till_date);
            // return $request->all();
            DB::beginTransaction();
            $program = Program::find($id);

            // Update the task with the validated data
            $program->update($request->all());

            if ($request->has('student_attachment')) {
                $program->clearMediaCollection('program-student-attachment');
                foreach ($request->student_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-student-attachment');
                }
            }
            if ($request->has('copy_passport_attachment')) {
                $program->clearMediaCollection('program-passport-attachment');
                foreach ($request->copy_passport_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-passport-attachment');
                }
            }
            if ($request->has('custodianship_declaration_attachment')) {
                $program->clearMediaCollection('program-custodianship-declaration-attachment');
                foreach ($request->custodianship_declaration_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-custodianship-declaration-attachment');
                }
            }
            if ($request->has('proof_immunization_attachment')) {
                $program->clearMediaCollection('program-proof-immunization-attachment');
                foreach ($request->proof_immunization_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-proof-immunization-attachment');
                }
            }
            if ($request->has('participation_agreement_attachment')) {
                $program->clearMediaCollection('program-participation-agreement-attachmentprogram-participation-agreement-attachment');
                foreach ($request->participation_agreement_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-participation-agreement-attachment');
                }
            }
            if ($request->has('self_introduction_attachment')) {
                $program->clearMediaCollection('program-self-introduction-attachment');
                foreach ($request->self_introduction_attachment as $image) {
                    $program->addMedia($image)->toMediaCollection('program-self-introduction-attachment');
                }
            }
            DB::commit();
            return redirect()->route('admin.university.course.view');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return $th->getMessage();
        }
    }
}
