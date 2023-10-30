<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\RequestLetter;
use App\Http\Controllers\Controller;
use App\Models\University\ProfileDetail;

class RequestLetterController extends Controller
{
    public function index()
    {
        return view('admin.request-letter');
    }

    public function create()
    {
        $countries = Country::all();
        $layout = auth_layout();
        return view('students.request-letter.create', compact('layout', 'countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            // 'university_name' => 'required',
            'university' => 'required'
        ]);

        $request->merge([
            'student_id' => auth()->user()->id
        ]);
        $request->merge([
            'university_id' => $request->university
        ]);
        //    return $request->all();
        $request_letter = RequestLetter::create($request->all());
        if ($request->has('request_letter')) {
            $request_letter->addMedia($request->request_letter)->toMediaCollection('request-letter');
        }
        if ($request_letter) {
            return redirect()->route('student.request.letter.list')->with('success', 'Request letter has been sent successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function getUniversity(Request $request)
    {
        $universities = ProfileDetail::select('university_name', 'id')->where('country', $request->country_id)->get();
        return response()->json($universities);
    }

    public function show($id)
    {
        $requestLetter = RequestLetter::find($id);

        return view('admin.request-letter-view', compact('requestLetter'));
    }

    public function studentList()
    {
        $auth_id = auth()->user()->id;
         $requestLetters = RequestLetter::where('student_id', $auth_id)->get();
        return view('students.request-letter.list', compact('requestLetters'));
    }

    public function studentListView($id, $school)
    {
        // return $school;
        $requestLetter = RequestLetter::find($id);
        return view('students.request-letter.view', compact('requestLetter'));
    }
}
