<?php

namespace App\Http\Controllers\Agent;

use App\Models\User;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Agent\BankDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\SchoolCommission;
use App\Models\Agent\AgentGeneralDetail;

class AgentProfileDetailsController extends Controller
{
    public function generalDetails()
    {
        $studentDetail = [];
        $countries = Country::where('block', '!=', 1)->get();
        $agentDetail = AgentGeneralDetail::where('agent_id', auth()->user()->id)->first();
        return view('agent.profile.general-details', compact(
            'agentDetail',
            'countries'
        ));
    }

    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }

    public function generalDetailsStore(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required|email',
            'company_phone_one' => 'required',
            'company_address' => 'required',
            'company_city' => 'required',
            'company_country' => 'required',
            'company_postcode' => 'required',
            // 'company_logo' => 'required|mimes:jpeg,png,jpg,gif',
            // 'trade_license' => 'required|mimes:jpeg,png,jpg,gif',
            // 'address_proof' => 'required|mimes:jpeg,png,jpg,gif',
            // 'tax_register_proof' => 'mimes:jpeg,png,jpg,gif',
        ]);
        DB::beginTransaction();
        try {
            //code...

            $request['agent_id'] = auth()->user()->id;
            $agentDetail =  AgentGeneralDetail::updateOrCreate(
                [
                    'agent_id' => auth()->user()->id
                ],
                $request->all()
            );

            if ($request->hasFile('company_logo') && $request->file('company_logo')->isValid()) {
                $agentDetail->clearMediaCollection('agent-company-logo');
                $agentDetail->addMediaFromRequest('company_logo')->toMediaCollection('agent-company-logo');
            }
            if ($request->hasFile('trade_license') && $request->file('trade_license')->isValid()) {
                $agentDetail->clearMediaCollection('agent-trade-license');
                $agentDetail->addMediaFromRequest('trade_license')->toMediaCollection('agent-trade-license');
            }
            if ($request->hasFile('address_proof') && $request->file('address_proof')->isValid()) {
                $agentDetail->clearMediaCollection('agent-address-proof');
                $agentDetail->addMediaFromRequest('address_proof')->toMediaCollection('agent-address-proof');
            }
            if ($request->hasFile('tax_register_proof') && $request->file('tax_register_proof')->isValid()) {
                $agentDetail->clearMediaCollection('agent-tax-register-proof');
                $agentDetail->addMediaFromRequest('tax_register_proof')->toMediaCollection('agent-tax-register-proof');
            }

            // if ($request->has('tax_register_proof')) {
            //     $agentDetail->clearMediaCollection('agent-tax-register-proof');
            //     $agentDetail->addMedia($request->tax_register_proof)->toMediaCollection('agent-tax-register-proof');
            // }
            if (!auth()->user()->profile_is_updated) {
                User::where('id', auth()->user()->id)->update([
                    'profile_is_updated' => 1
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Profile Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function bankDetails()
    {
        $agentBankDetail = BankDetail::where('agent_id', auth()->user()->id)->first();
        $agentDetail = AgentGeneralDetail::where('agent_id', auth()->user()->id)->first();
        return view('agent.profile.bank-details', compact(
            'agentDetail',
            'agentBankDetail'
        ));
    }

    public function bankDetailsStore(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            //code...
            $request->validate([
                'account_holder_name' => 'required',
                'bank_name' => 'required',
                'account_number' => 'required',
                'ifsc_code' => 'required',
                'swift_code' => 'required',
            ]);

            $request['agent_id'] = auth()->user()->id;
            BankDetail::updateOrCreate(
                [
                    'agent_id' => auth()->user()->id
                ],
                $request->all()
            );

            DB::commit();

            return redirect()->back()->with('success', 'Bank Details Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function schoolCommission()
    {
        $commissions = SchoolCommission::latest()->get();
        return view('agent.profile.school-commission', compact('commissions'));
    }

    public function commissionPolicy()
    {
        return view('agent.profile.commission-policy');
    }

    public function manageStaff()
    {
        return view('agent.profile.manage-staff');
    }
}
