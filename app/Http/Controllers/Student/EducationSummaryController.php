<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentDetail;
use App\Models\Student\EducationSummary;
use App\Http\Requests\StoreEducationSummaryRequest;
use App\Http\Requests\UpdateEducationSummaryRequest;

class EducationSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educationSummary = EducationSummary::whereUserId(Auth::user()->id)->first();
        $countries = DB::table('countries')->get();
        $grading_schemes = DB::table('grading_schemes')->get();
        $level_of_educations = DB::table('level_of_educations')->get();
        return view('students.education-history', compact('countries', 'grading_schemes', 'level_of_educations', 'educationSummary'));
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
    public function store(StoreEducationSummaryRequest $request)
    {
        // return $request->all();
        try {
            //code...

            $userId = Auth::user()->id;
            if (Auth::user()->type == 'agent') {
                $student = StudentDetail::whereUserId($request->user_id)->where('agent_id', Auth::user()->id)->first();

                $request['agent_id'] = Auth::user()->id;
                $request['user_id'] = $student->user_id;
                $userId = $student->user_id;
            } elseif (Auth::user()->type == 'staff') {

                $staff = Staff::whereUserId(Auth::user()->id)->first();
                $agentId = $staff->agent_id;
                $staffId = $staff->user_id;
                if ($request->has('user_id')) {
                    $student = StudentDetail::whereUserId($request->user_id)->whereAgentId($agentId)->whereStaffId($staffId)->first();
                    $userId = $student->user_id;
                }
                $request['agent_id'] = $agentId;
                $request['staff_id'] = $staffId;
            } else {
                $request['user_id'] = Auth::user()->id;
            }
            // return $request;
            // $request['user_id'] = Auth::user()->id;

            DB::beginTransaction();

            EducationSummary::updateOrCreate(
                [
                    'user_id' => $userId,

                ],
                $request->all()
            );
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
    public function show(EducationSummary $educationSummary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EducationSummary $educationSummary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationSummaryRequest $request, EducationSummary $educationSummary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EducationSummary $educationSummary)
    {
        //
    }
}
