<?php

namespace App\Http\Controllers\Student;

use App\Models\Student\Question;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "asd";
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
    public function store(StoreQuestionRequest $request)
    {
        // return $request->data;
        $user_id = Auth::user()->id;
        DB::beginTransaction();
        try {
            //code...
            $temArr = [];
            foreach ($request->data as $item) {
                // return is_array($item['answer']);
                $ans = null;
                if (array_key_exists('answer', $item)) {

                    if (is_array($item['answer']) && array_key_exists('answer', $item)) {
                        $ans = json_encode($item['answer']) ?? null;
                    } else {
                        $ans = $item['answer'] ?? null;
                    }
                }
                // $temArr[] = $ans;
                // return $ans;


                $question = new Question();
                $question->user_id = $user_id;
                $question->question = $item['question'];
                $question->answer = $ans;
                $question->save();
                // return $question;

            }
            // return $temArr;
            DB::commit();
            return response()->json([
                'message' => 'Questions saved successfully'
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
