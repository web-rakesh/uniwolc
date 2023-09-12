<?php

namespace App\Http\Controllers\Student;

use App\Models\Staff;
use App\Models\Student\TestScore;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentDetail;
use App\Http\Requests\StoreTestScoreRequest;
use App\Http\Requests\UpdateTestScoreRequest;

class TestScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testScore = TestScore::whereUserId(Auth::user()->id)->first();
        // return $testScore;
        return view('students.test-score', compact('testScore'));
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
    public function store(StoreTestScoreRequest $request)
    {
        $reading_score = isset($request->{$request->english_test_type . '_reading_score'}) ? $request->{$request->english_test_type . '_reading_score'} : '';

        $listening_score = isset($request->{$request->english_test_type . '_listening_score'}) ? $request->{$request->english_test_type . '_listening_score'} : '';

        $writing_score = isset($request->{$request->english_test_type . '_writing_score'}) ? $request->{$request->english_test_type . '_writing_score'} : '';

        $speaking_score = isset($request->{$request->english_test_type . '_speaking_score'}) ? $request->{$request->english_test_type . '_speaking_score'} : '';

        $exam_date = isset($request->{$request->english_test_type . '_exam_date'}) ? $request->{$request->english_test_type . '_exam_date'} : '';

        $total_score = isset($request->{$request->english_test_type . '_total_score'}) ? $request->{$request->english_test_type . '_total_score'} : '';


        $data['reading_score'] = $reading_score;
        $data['listening_score'] = $listening_score;
        $data['writing_score'] = $writing_score;
        $data['speaking_score'] = $speaking_score;
        $data['exam_date'] = $exam_date;
        $data['total_score'] = $total_score;
        $data['english_test_type'] = $request->english_test_type;
        $data['is_gmat'] = $request->is_gmat;
        $data['is_gre'] = $request->is_gre;

        // return $data;

        try {
            //code...
            $userId = Auth::user()->id;
            if (Auth::user()->type == 'agent') {
                $student = StudentDetail::whereUserId($request->user_id)->where('agent_id', Auth::user()->id)->first();

                $data['agent_id'] = Auth::user()->id;
                $data['user_id'] = $student->user_id;
                $userId = $student->user_id;
            } elseif (Auth::user()->type == 'staff') {
                $staff = Staff::whereUserId(Auth::user()->id)->first();
                $agentId = $staff->agent_id;
                $staffId = $staff->user_id;
                if ($request->has('user_id')) {
                    $student = StudentDetail::whereUserId($request->user_id)->whereAgentId($agentId)->whereStaffId($staffId)->first();
                    $userId = $student->user_id;
                }
                $data['agent_id'] = $agentId;
                $data['staff_id'] = $staffId;
            } else {
                $data['user_id'] = Auth::user()->id;
            }
            // return $request;
            DB::beginTransaction();

            TestScore::updateOrCreate(
                [
                    'user_id' => $userId,

                ],
                $data
            );
            DB::commit();

            return redirect()->back()->with('success', 'Test Score Saved Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();

            return redirect()->back()->with('error', 'Test Score Saved Failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TestScore $testScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestScore $testScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestScoreRequest $request, TestScore $testScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestScore $testScore)
    {
        //
    }
}
