<?php

namespace App\Http\Controllers\University;

use Illuminate\Support\Str;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\University\ProfileDetail;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('university.programs');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $educationLevels = DB::table('level_of_educations')->get();
        return view('university.programs-add', compact('educationLevels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        // return $request->all();
        try {
            //code...
            $request['user_id'] = Auth::user()->id;
            $request['slug'] = Str::slug($request->program_title);
            $request['program_till_date'] = json_encode($request->program_till_date);
            // return $request->all();
            DB::beginTransaction();

            $program = Program::Create($request->all());


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

            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
        // return $program;
        $university = ProfileDetail::where('user_id', $program->user_id)->first();
        $relatedPrograms = Program::select('id', 'program_title')->where('id', '!=', $program->id)->limit(5)->latest()->get();
        // $universityImage = $university->getMedia('university-picture');

        return view('university.program-show', compact('program', 'relatedPrograms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        // return $program;
        $educationLevels = DB::table('level_of_educations')->get();
        return view('university.program-edit', compact('program', 'educationLevels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, Program $program)
    {

        $request['program_till_date'] = json_encode($request->program_till_date);
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
        // Redirect to the task's show page or any other desired route
        return redirect()->route('university.program.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        //
    }
}
