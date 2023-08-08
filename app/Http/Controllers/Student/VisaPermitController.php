<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Staff;
use App\Models\Student\VisaPermit;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentDetail;
use App\Http\Requests\StoreVisaPermitRequest;
use App\Http\Requests\UpdateVisaPermitRequest;

class VisaPermitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visaPermit = VisaPermit::where('user_id', Auth::user()->id)->first();
        return view('students.visa-and-permit', compact('visaPermit'));
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
    public function store(StoreVisaPermitRequest $request)
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

                User::whereId(Auth::user()->id)->update([
                    'profile_is_updated' => 1
                ]);
            }
            // return $request;
            DB::beginTransaction();

            VisaPermit::updateOrCreate(
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
    public function show(VisaPermit $visaPermit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisaPermit $visaPermit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisaPermitRequest $request, VisaPermit $visaPermit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisaPermit $visaPermit)
    {
        //
    }
}
