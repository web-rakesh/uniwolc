<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\PreModelQuestion;
use Illuminate\Support\Facades\DB;

class ManagePreSubmissionModel extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0;
    public $formData = [], $course_id, $searchItem;


    public function render()
    {

        $modelQuestions = PreModelQuestion::query()
            ->when($this->searchItem, function ($query) {
                $query->where('title', 'like', '%' . $this->searchItem . '%');
            })
            ->latest()
            ->paginate(10);
        return view('livewire.admin.manage-pre-submission-model', [
            'modelQuestions' => $modelQuestions,]);
    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'formData.title' => 'required|max:99',
        ], [
            'formData.title' => 'The title field is required.',
            'formData.title.max' => 'The title field must not exceed 99 characters.',
        ]);

        // dd($this->formData);
        try {
            //code...
            DB::beginTransaction();
            PreModelQuestion::Create([
                'title' => $this->formData['title'],
            ]);
            session()->flash('message',  'Course Created Successfully.');

            $this->closeModal();
            $this->resetInputFields();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
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
        $courses = PreModelQuestion::findOrFail($id);
        $this->course_id = $id;
        $this->formData = $courses->toArray();
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'formData.title' => 'required|max:99',
        ], [
            'formData.title' => 'The title field is required.',
            'formData.title.max' => 'The title field must not exceed 99 characters.',
        ]);
        if ($this->course_id) {
            $course = PreModelQuestion::find($this->course_id);
            $course->update([
                'title' => $this->formData['title'],
            ]);

            session()->flash('message', 'Course Updated Successfully.');
        }
        $this->closeModal();
        $this->resetInputFields();
    }

    public function deleteCourse($id)
    {
        PreModelQuestion::find($id)->delete();
        $this->closeModal();
    }
}
