<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\WizardQuestionAnswer;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Question\QuestionScreen;
use App\Models\Admin\Question\QuestionCategory;
use App\Models\Admin\Question\QuestionSubCategory;

class QuestionWizard extends Component
{
    public $currentStep = 1, $finalStep, $collapseNum;
    public $formData = [], $formDataStr = '';
    public $questionScreens;
    public $country_id, $state_id, $categories_of_education_id, $level_of_education_id, $grading_scheme_id;
    public function render()
    {
        $this->finalStep = QuestionScreen::count();
        $this->questionScreens =  QuestionScreen::with('category.subCategory')->where('sequence_no', $this->currentStep)->get();
        // dd(Country::class);

        return view('livewire.student.question-wizard');
    }

    public function mount()
    {
        $this->dataFetch();
    }

    public function dataFetch()
    {
        $this->formData = [];
        $saveData = WizardQuestionAnswer::whereStudentId(Auth::user()->id)->whereScreenId($this->currentStep)->get();

        foreach ($saveData ?? [] as $key => $value) {
            # code...
            $rbb = QuestionCategory::find($value->answer_from_category);

            // dd($value);
            // dd($rbb);
            if ($value->answer_from_table != null) {

                if ($value->answer_from_table == 'countries') {
                    $this->country_id = (string)$value->answer_value_from_table;
                } elseif ($value->answer_from_table == 'states') {
                    $this->state_id = (string)$value->answer_value_from_table;
                } elseif ($value->answer_from_table == 'categories_of_education') {
                    $this->categories_of_education_id = (string)$value->answer_value_from_table;
                } elseif ($value->answer_from_table == 'level_of_education') {
                    $this->level_of_education_id = (string)$value->answer_value_from_table;
                } elseif ($value->answer_from_table == 'grading_scheme') {
                    $this->grading_scheme_id = (string)$value->answer_value_from_table;
                }
                // dd('');
                $this->formDataStr = (string)$value->answer_from_subcategory;
            } else if ($rbb->type == 'radio' && $value->answer_from_table == null) {

                $this->formDataStr = (string)$value->answer_from_subcategory;
            } elseif ($rbb->type == 'checkbox') {
                array_push($this->formData, (string)$value->answer_from_subcategory);
            }
        }
        // dd($saveData);
    }

    public function prevStep()
    {
        $this->currentStep = $this->currentStep - 1;
        $this->dataFetch();
        // dd($this->formData);
    }

    public function nextStep()
    {
        $this->wizardFormStore();
        $this->currentStep = $this->currentStep + 1;
        $this->dataFetch();
    }

    public function submit()
    {
        return redirect()->route('student.dashboard');
        dd(WizardQuestionAnswer::all());
    }

    public function wizardFormStore()
    {

        foreach ($this->questionScreens as $key => $value) {
            # code...

            $c = 0;

            foreach ($value->category as $key => $category) {
                if ($c == 0) {
                    WizardQuestionAnswer::whereStudentId(Auth::user()->id)->whereScreenId($value->sequence_no)->delete();
                }
                // dd($category->type);
                // dd($category->has_sub_category);
                if ($category->type == "radio") {
                    $subCategory = QuestionSubCategory::find($this->formDataStr);

                    WizardQuestionAnswer::create(
                        [
                            'student_id' => Auth::user()->id,
                            'screen_id' => $value->sequence_no,
                            'answer_from_category' => $subCategory->category_id,
                            'answer_from_subcategory' => $subCategory->id,
                            'answer_value' => $subCategory->name,
                        ]
                    );
                } elseif ($category->type == "checkbox") {
                    $getAns =  QuestionSubCategory::find($this->formData);

                    if ($getAns->count() > 0) {
                        WizardQuestionAnswer::whereStudentId(Auth::user()->id)->whereScreenId($this->currentStep)->delete();
                        foreach ($getAns as $key => $value) {
                            # code...
                            WizardQuestionAnswer::create(
                                [
                                    'student_id' => Auth::user()->id,
                                    'screen_id' => $this->questionScreens[0]->sequence_no,
                                    'answer_from_category' => $value->category_id,
                                    'answer_from_subcategory' => $value->id,
                                    'answer_value' => $value->name,
                                ]
                            );
                        }
                    }
                } elseif ($category->type == "dropdown") {
                    if ($category->has_sub_category == 1) {
                        // dd($this->country_id);

                        $tableName = $category->table_name;
                        if ($tableName == 'countries') {
                            $tableValueId = $this->country_id;
                            // dd($tableValueId);
                        } elseif ($tableName == 'states') {
                            $tableValueId = $this->state_id;
                        } elseif ($tableName == 'categories_of_educations') {

                            $tableValueId = $this->categories_of_education_id;
                        } elseif ($tableName == 'level_of_educations') {

                            $tableValueId = $this->level_of_education_id;
                        } elseif ($tableName == 'grading_schemes') {
                            $tableValueId = $this->grading_scheme_id;
                        } else {
                            $tableValueId = '';
                        }
                        // dd($tableValueId);
                        WizardQuestionAnswer::create(
                            [
                                'student_id' => Auth::user()->id,
                                'screen_id' => $value->sequence_no,
                                'answer_from_category' => $category->id,
                                'answer_from_table' => $category->table_name,
                                'answer_value_from_table' =>  $tableValueId ?? '',
                            ]
                        );
                        $tableValueId = '';
                    }
                }
                $c++;
            }

            $this->formData = [];
        }
    }

    public function collapseSet($id)
    {
        $this->collapseNum = $id;
    }
}
