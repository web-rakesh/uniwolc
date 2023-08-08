<?php

use App\Models\Country;
use Illuminate\Support\Str;
use App\Models\GeneralSetting;
use App\Models\ManageSubAdmin;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use App\Models\Student\ApplyProgram;
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
        return $amount + $fees;
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

if (!function_exists('get_country')) {
    function get_country($id = 101)
    {
        
        $country =  Country::where('id', $id)->first();
        $currency =  DB::table('currencies')->where('country', $country->name)->first();
        return $country->name;
    }
}
