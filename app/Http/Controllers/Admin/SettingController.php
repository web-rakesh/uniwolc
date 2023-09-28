<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function general()
    {
        return view('admin.setting.general');
    }

    public function levelOfEducation()
    {
        return view('admin.setting.level-of-education');
    }

    public function gradingScheme()
    {
        return view('admin.setting.grading-scheme');
    }

    public function country()
    {
        return view('admin.setting.country');
    }

    public function termsAndCondition()
    {
        $terms_and_condition = GeneralSetting::select('terms_and_condition')->first()->terms_and_condition;
        return view('admin.setting.terms-and-condition', compact('terms_and_condition'));
    }

    public function termsAndConditionStore(Request $request)
    {
        $terms =  Str::length($request->terms_and_condition);
        if ($terms  < 12) {
            return redirect()->back()->with('error', 'Terms and condition is required');
        }
        $request->validate([
            'terms_and_condition' => 'required',
        ]);
        $setting = GeneralSetting::first();
        $setting->terms_and_condition = $request->terms_and_condition;
        $setting->save();

        return redirect()->back()->with('success', 'Terms and condition updated successfully');
    }

    public function privacyPolicy()
    {
        $privacy_policy = GeneralSetting::select('privacy_policy')->first()->privacy_policy;
        return view('admin.setting.privacy-policy', compact('privacy_policy'));
    }

    public function privacyPolicyStore(Request $request)
    {
        $terms =  Str::length($request->privacy_policy);
        if ($terms  < 12) {
            return redirect()->back()->with('error', 'Terms and condition is required');
        }
        $request->validate([
            'privacy_policy' => 'required',
        ]);
        $setting = GeneralSetting::first();
        $setting->privacy_policy = $request->privacy_policy;
        $setting->save();

        return redirect()->back()->with('success', 'Terms and condition updated successfully');
    }
}
