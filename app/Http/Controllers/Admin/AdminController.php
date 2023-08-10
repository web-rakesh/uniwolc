<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Staff;
use App\Models\Country;
use Illuminate\Support\Str;
use App\Models\AgentProfile;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use App\Models\PaymentHistory;
use App\Models\EducationPartner;
use App\Models\University\Program;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Student\ApplyProgram;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Student\StudentDetail;
use App\Models\University\ProfileDetail;



class AdminController extends Controller
{
    public function dashboard()
    {

        $student = StudentDetail::count();
        $agent = User::where('type', 1)->count();
        $staff = Staff::count();
        $staff = Staff::count();
        $university = ProfileDetail::count();

        $program = Program::count();
        $applyProgram = ApplyProgram::count();
        $approvedApplication = ApplyProgram::where('status', 1)->count();
        $blockApplication = ApplyProgram::where('status', 2)->count();
        $education = EducationPartner::count();


        $paymentHistory = PaymentHistory::sum('amount');
        $todayPayment = PaymentHistory::where('created_at', date('Y-m-d', strtotime(now())))->sum('amount');
        // $totalAgentFees = ApplyProgram::where('agent_id', '!=', null)->first();


        return view(
            'admin.dashboard',
            compact(
                'student',
                'agent',
                'staff',
                'university',
                'program',
                'education',
                'applyProgram',
                'paymentHistory',
                'approvedApplication',
                'blockApplication',
                'todayPayment'
            )
        );
    }
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
            $email =  Str::slug($request->university_name) . '-' . time() . '@gmail.com';
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

                $university = new User();
                $university->name = $request->university_name;
                $university->password = Hash::make('password');

                // $university = User::create([
                //     'name' => $request->university_name,
                //     'email' => $email,
                //     'password' => Hash::make('password'),
                // ]);

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
            return redirect()->back()->with('error', $th->getMessage());
            return $th->getMessage();
        }
    }



    public function agentList()
    {
        return view('admin.agent.agent');
    }

    public function agentCreate()
    {
        $countries =  Country::all();

        return view('admin.agent.agent-create', compact('countries'));
    }

    public function agentStore(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        try {
            //code...

            // return $request->all();
            DB::beginTransaction();

            $agent = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('password'),
                'type' => 1,
            ]);

            $universityProfile =  AgentProfile::updateOrCreate(
                [
                    'user_id' => $agent->id,

                ],
                $request->all()
            );

            DB::commit();

            return redirect()->route('admin.agent')->with('success', 'Agent Created Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }
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
