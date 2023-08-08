<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
