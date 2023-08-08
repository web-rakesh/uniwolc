<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\University\ProfileDetail;

use App\Models\Student\StudentDetail;
use App\Models\Staff;

class AdminController extends Controller
{
    public function studentList()
    {
        return view('admin.student');
    }


    public function student_single_profile($studentid)
    {

        $profile = StudentDetail::where('id', $studentid)->get()->first();

        return view('admin.student-profile', compact('profile'));
    }

    public function universityList()
    {
        return view('admin.university.university');
    }

    public function universityCreate($id = null)
    {
        $universityDetail  = null;
        if ($id) {
            $universityDetail = ProfileDetail::findOrFail($id);
        }
        $programLevels = EducationLevel::all();
        $countries =  Country::all();
        return view('admin.university.university-create', compact('countries', 'universityDetail', 'programLevels'));
    }

    public function universityStore(Request $request)
    {
        // return $request->all();
        $email = $request->email;
        if ($request->email == '') {
            $email =  Str::slug($request->university_name) . '@gmail.com';
        }
        // $request['email'] = $email;
        // $request['blocked_country'] = implode(',', $request->blocked_country ?? []);
        // return $request;
        try {
            DB::beginTransaction();
            //code...
            // return $request->all();
            $universityId = null;
            if ($request->university_id != '') {
                $uni = ProfileDetail::findOrFail($request->university_id);
                // return $request->university_id;
                $request['user_id'] = $uni->user_id;
                $universityId = $uni->user_id;
            } else {
                $university = User::create([
                    'name' => $request->university_name,
                    'email' => $email,
                    'password' => Hash::make('password'),
                ]);
                $university->type = 2;
                $university->save();
                $universityId = $university->id;
                $request['slug'] = Str::slug($request->university_name);
            }

            // return  $request->all();
            $request['user_id'] = $universityId;
            $request['blocked_country'] = implode(',', $request->blocked_country ?? []);
            $request['program_level'] = implode(',', $request->program_level ?? []);
            $universityProfile =  ProfileDetail::updateOrCreate(
                [
                    'user_id' => $universityId,

                ],
                $request->all()
            );

            if ($request->has('university_picture')) {
                $universityProfile->clearMediaCollection('university-picture');
                foreach ($request->university_picture as $image) {
                    $universityProfile->addMedia($image)->toMediaCollection('university-picture');
                }
            }


            DB::commit();

            return redirect()->route('admin.university')->with('success', 'University Created Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return $th->getMessage();
        }
    }



    public function agentList()
    {
        return view('admin.agent');
    }

    public function agent_profile($id)
    {

        $profile = User::where('id', $id)->where('type', 1)->get()->first();

        $students = StudentDetail::where('agent_id', $id)->get();
        $staffs = Staff::where('agent_id', $id)->get();

        return view('admin.agent-profile', compact('profile', 'students', 'staffs'));
    }

    public function staffList()
    {
        return view('admin.staff');
    }

    public function staff_profile($id)
    {

        $profile = Staff::where('id', $id)->get()->first();
        $students = StudentDetail::where('staff_id', $id)->get();
        return view('admin.staff-profile', compact('profile', 'students'));
    }

    public function transaction()
    {
        return view('admin.transaction');
    }

    public function educationPartnerList()
    {
        return view('admin.education-partner');
    }

    public function getCurrency(Request $request)
    {
        return get_currency($request->id_country);
    }
}
