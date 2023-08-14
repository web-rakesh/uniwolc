<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionCategoryController extends Controller
{
    public function questionCategoryList()
    {
        return view('admin.questionCategory.questionCategoryList');
    }

    public function questionSubCategoryList()
    {
        return view('admin.questionCategory.questionSubCategoryList');
    }

    public function questionScreen(){
        return view('admin.questionCategory.questionScreen');
    }
}
