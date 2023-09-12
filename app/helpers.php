<?php

use App\Models\City;
use App\Models\Staff;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Str;
use App\Models\AgentProfile;
use App\Models\GeneralSetting;
use App\Models\ManageSubAdmin;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use App\Models\Student\ApplyProgram;
use App\Models\Student\StudentDetail;
use App\Models\Student\ApplicantUploadDocument;

if (!function_exists('show_route')) {
    function show_route($model, $resource = null)
    {
        $resource = $resource ?? Str::plural(Str::lower(class_basename($model)));

        return route("{$resource}.show", $model);
    }
}

if (!function_exists('plural_from_model')) {
    function plural_from_model($model)
    {
        $plural = Str::plural(class_basename($model));

        return Str::kebab($plural);
    }
}

if (!function_exists('get_upload_document')) {
    function get_upload_document($id, $user_id, $name)
    {
        $document = ApplicantUploadDocument::where('apply_program_id', $id)->where('user_id', $user_id)->where('document_name', $name)->exists();

        return $document;
    }
}

if (!function_exists('get_blocked_country')) {
    function get_blocked_country($blockId)
    {
        $blockId = explode(',', $blockId);
        $country = \App\Models\Country::whereIn('id', $blockId)->pluck('name')->toArray();

        return $country;
    }
}

if (!function_exists('menu_permission')) {
    function menu_permission($menu)
    {
        $auth = auth()->guard('admin')->user();
        $menu =   ManageSubAdmin::where('admin_id', $auth->id)->where('menu', $menu)->exists();
        if ($menu || $auth->is_admin == 1) {
            return true;
        } else {
            // abort(403, 'Unauthorized action.');
            return false;
        }
    }
}

if (!function_exists('action_permission')) {
    function action_permission($menu, $action = null)
    {
        $auth = auth()->guard('admin')->user();
        $subAdmin =   ManageSubAdmin::where('admin_id', $auth->id)->where('menu', $menu)->first();
        $permission = json_decode($subAdmin->permission ?? '', true);
        if ($auth->is_admin == 1 || ($permission != null &&  in_array($action, $permission))) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('payment_fee')) {
    function payment_fee()
    {
        $setting = GeneralSetting::first();
        return $fees = $setting->processing_fees;
    }
}

if (!function_exists('total_payable_amount')) {
    function total_payable_amount($amount)
    {
        $setting = GeneralSetting::first();
        $fees = $setting->processing_fees;
        $fees = ($amount * $fees) / 100;
        return number_format($amount + $fees, 2, '.', '');
    }
}

if (!function_exists('get_program_university_name')) {
    function get_program_university_name($id)
    {
        $applyId = explode(',', $id);
        $pgId = ApplyProgram::whereIn('id', $applyId)->pluck('program_id');
        return Program::with('university')->whereIn('id', $pgId)->get();
    }
}

if (!function_exists('get_user_permission')) {
    function get_user_permission($id, $menu, $action)
    {

        $subAdmin = ManageSubAdmin::where('admin_id', $id)->where('menu', $menu)->first();
        // return $subAdmin->permission;

        $permission = json_decode($subAdmin->permission ?? '', true);
        // return $subAdmin->user_permission;
        if ($permission != null &&  in_array($action, $permission)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('get_currency')) {
    function get_currency($id = 101)
    {
        $country =  Country::where('id', $id)->first();
        $currency =  DB::table('currencies')->where('country', $country->name)->first();

        if (isset($currency->symbol)) {
            return $currency->symbol;
        } else {
            return $currency->code;
        }
    }
}

if (!function_exists('get_currency_code')) {
    function get_currency_code($id = 101)
    {
        // return $id;
        $country =  Country::where('id', $id)->first();
        return $country->code;
    }
}

if (!function_exists('get_payment_currency')) {
    function get_payment_currency($id = 101)
    {
        $country =  Country::where('id', $id)->first();
        $currency =  DB::table('currencies')->where('country', $country->name)->first();
        return $currency->code;
    }
}

if (!function_exists('get_country')) {
    function get_country($id = 101)
    {
        $country =  Country::where('id', $id)->first();
        if ($country) {
            return $country->name;
        }
    }
}

if (!function_exists('get_state')) {
    function get_state($id = 101)
    {
        $state =  State::where('id', $id)->first();
        if ($state) {
            return $state->name;
        }
    }
}

if (!function_exists('get_city')) {
    function get_city($id = 101)
    {
        $city =  City::where('id', $id)->first();
        if ($city) {
            return $city->name;
        }
        return false;
    }
}

if (!function_exists('get_agent_unique_id')) {
    function get_agent_unique_id($id)
    {
        // return $id;
        $countryCode = get_currency_code($id);
        $agent = AgentProfile::latest()->first();
        if ($agent->count() == 0) {
            return 'UW' . $countryCode . '10000';
        } else {

            return 'UW' . $countryCode . ($agent->id + 1) . '0000';
        }
        return null;
    }
}

if (!function_exists('get_agent_id')) {
    function get_agent_id($id)
    {
        $agent = \App\Models\Staff::where('user_id', $id)->first();
        if ($agent) {
            return $agent->agent_id;
        }
        return null;
    }
}

if (!function_exists('get_student_id')) {
    function get_student_id($id)
    {
        $student = StudentDetail::whereUserId($id)->latest()->first();
        if ($student) {
            return $student->student_id;
        } else {
            $student = StudentDetail::latest()->first();
            if (!empty($student)) {
                return $student->student_id + 1;
            } else {
                return 100000;
            }
        }

        return null;
    }
}

if (!function_exists('agent_verify')) {
    function agent_verify()
    {
        $agent = AgentProfile::where('user_id', auth()->user()->id)->first();
        if ($agent) {
            return $agent->is_verify;
        }
        return null;
    }
}

if (!function_exists('staff_verify')) {
    function staff_verify()
    {
        $staff = Staff::where('user_id', auth()->user()->id)->first();
        if ($staff) {
            return $staff->status;
        }
        return null;
    }
}

if (!function_exists('get_education_scheme_grade')) {
    function get_education_scheme_grade($id)
    {
        $education = \App\Models\GradingScheme::where('id', $id)->first();
        if ($education) {
            return $education->scheme;
        }
        return null;
    }
}
if (!function_exists('get_education_level')) {
    function get_education_level($id)
    {
        $education = \App\Models\EducationLevel::where('id', $id)->first();
        if ($education) {
            return $education->level_name;
        }
        return null;
    }
}
