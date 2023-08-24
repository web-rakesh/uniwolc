<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\Staff;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Str;
use App\Models\AgentProfile;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use App\Models\PaymentHistory;

use Illuminate\Support\Carbon;
use App\Models\AgentCommission;
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
        $approvedApplication = ApplyProgram::where('program_status', 1)->count();
        $blockApplication = ApplyProgram::where('program_status', 2)->count();
        $education = EducationPartner::count();

        $totalPayment = PaymentHistory::sum('amount');
        $todayPayment = PaymentHistory::whereDate('payment_date', Carbon::today())->sum('amount');
        $totalAgentFees = AgentCommission::sum('amount');
        $totalAgentPayoutFees = AgentCommission::whereStatus(1)->wherePaymentStatus(1)->sum('amount');


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
                'approvedApplication',
                'blockApplication',
                'totalPayment',
                'todayPayment',
                'totalAgentFees',
                'totalAgentPayoutFees'
            )
        );
    }
    public function studentList()
    {
        return view('admin.student');
    }


    public function student_single_profile($studentId)
    {

        $profile = StudentDetail::where('id', $studentId)->get()->first();

        $allApplyProgram = ApplyProgram::whereUserId($profile->user_id)->latest()->get();
        $blockProgram = ApplyProgram::whereUserId($profile->user_id)->whereProgramStatus(3)->latest()->get();

        return view('admin.student-profile', compact('profile', 'allApplyProgram', 'blockProgram'));
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

    public function agentCreate(Request $request)
    {
        // return $request->all();
        $agentDetail  = null;
        if ($request->id) {
            $agentDetail = AgentProfile::whereUserId($request->id)->first();
        }
        $countries =  Country::all();
        // return $agentDetail;

        return view('admin.agent.agent-create', compact('countries', 'agentDetail'));
    }

    public function agentStore(Request $request)
    {
        // return $request->all();
        // return get_agent_unique_id((int)$request->country);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        try {
            //code...
            // return $request->all();
            DB::beginTransaction();
            $agentId = $request->agent_update_id;
            if ($request->agent_update_id == '') {
                $request['agent_id'] = get_agent_unique_id((int)$request->country);
                $agent = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make('password'),
                    'type' => 1,
                ]);
                $agentId = $agent->id;
            }
            // return $agentId;
            $universityProfile =  AgentProfile::updateOrCreate(
                [
                    'user_id' => $agentId,
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
        // $profile = User::where('id', $id)->where('type', 1)->first();
        $agentProfile = AgentProfile::where('user_id', $id)->first();
        $students = StudentDetail::where('agent_id', $id)->get();
        $staffs = Staff::where('agent_id', $id)->get();

        return view('admin.agent-profile', compact('agentProfile', 'students', 'staffs'));
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
        return view('admin.transaction.transaction');
    }

    public function agentTransaction()
    {
        return view('admin.transaction.agent-transaction', ['payout' => 4]);
    }

    public function agentTransactionPayout()
    {
        return view('admin.transaction.agent-transaction', ['payout' => 1]);
    }

    public function agentCommissionDetails(AgentCommission $agentCommission)
    {
        return view('admin.transaction.agent-commission-details', compact('agentCommission'));
    }

    public function educationPartnerList()
    {
        return view('admin.education-partner');
    }

    public function educationPartnerDetail(EducationPartner $educationPartner)
    {
        return view('admin.education-partner-detail', compact('educationPartner'));
    }

    public function getCurrency(Request $request)
    {
        $data['states'] = State::where("country_id", $request->id_country)
            ->get(["name", "id"]);
        $data['currency'] =  get_currency($request->id_country);
        return response()->json($data);
    }

    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)
            ->get(["name", "id"]);

        return response()->json($data);
    }
}
