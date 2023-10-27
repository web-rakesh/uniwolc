<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\PreModelQuestion;
use Illuminate\Support\Facades\DB;
use App\Models\ProgramPreModelQuestion;

class ManagePreSubmissionModelQuestion extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0;
    public $formData = [], $course_id, $searchItem, $modelQuestions = [];

    public function render()
    {
        $this->modelQuestions = PreModelQuestion::all();
        $questions = ProgramPreModelQuestion::query()
            ->paginate(10);
        return view('livewire.admin.manage-pre-submission-model-question', [
            'questions' => $questions,
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'formData.label' => 'required|max:99',

        ], [
            'formData.label' => 'The label field is required.',
            'formData.label.max' => 'The label field must not exceed 99 characters.',
        ]);

        // dd($this->formData);
        try {
            //code...
            DB::beginTransaction();
            ProgramPreModelQuestion::Create([
                'pre_model_question_id' => $this->formData['pre_model_question_id'],
                'label' => $this->formData['label'],
                'type' => $this->formData['type'],
                'required' => @$this->formData['required'],
                'placeholder' => @$this->formData['placeholder'],
                'options' => @$this->formData['options'],
            ]);
            session()->flash('message',  'Course Created Successfully.');

            $this->closeModal();
            $this->resetInputFields();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th);
        }
    }

    public function resetInputFields()
    {
        $this->formData = [];
    }


    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function editCourse($id)
    {
        $courses = ProgramPreModelQuestion::findOrFail($id);
        $this->course_id = $id;
        $this->formData = $courses->toArray();
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'formData.label' => 'required|max:99',
        ], [
            'formData.label' => 'The title field is required.',
            'formData.label.max' => 'The title field must not exceed 99 characters.',
        ]);
        if ($this->course_id) {
            $course = ProgramPreModelQuestion::find($this->course_id);
            $course->update([
                'pre_model_question_id' => $this->formData['pre_model_question_id'],
                'label' => $this->formData['label'],
                'type' => $this->formData['type'],
                'required' => @$this->formData['required'],
                'placeholder' => @$this->formData['placeholder'],
                'options' => @$this->formData['options'],
            ]);

            session()->flash('message', 'Course Updated Successfully.');
        }
        $this->closeModal();
        $this->resetInputFields();
    }

    public function deleteCourse($id)
    {
        ProgramPreModelQuestion::find($id)->delete();
        $this->closeModal();
    }
}
