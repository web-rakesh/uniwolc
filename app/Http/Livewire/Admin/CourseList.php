<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class CourseList extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0;
    public $formData = [], $course_id;

    public function render()
    {
        $courses = Course::latest()->paginate(10);
        return view('livewire.admin.course-list', compact('courses'));
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
            'formData.image' => 'required|mimes:jpg,jpeg,png,bmp,tiff|max:1024',
        ], [
            'formData.title' => 'The title field is required.',
            'formData.title.max' => 'The title field must not exceed 99 characters.',
            'formData.image.required' => 'The image field is required.',
            'formData.image.mimes' => 'The image field must be a file of type: jpg,jpeg,png,bmp,tiff.',
            'formData.image.max' => 'The image field must not exceed 1MB.',
        ]);

        // dd($this->formData['title']);
        try {
            //code...
            DB::beginTransaction();
            $course = Course::Create([
                'title' => $this->formData['title'],
                'description' => $this->formData['description'],
            ]);

            $image = $this->formData['image']; // Store the video in the 'videos' directory
            if ($image) {
                // Attach the video to the model
                $course->clearMediaCollection('course-image');
                $course->addMedia($image)->toMediaCollection('course-image');
            }


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
        $courses = Course::findOrFail($id);
        $this->course_id = $id;
        $this->formData = $courses->toArray();
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'formData.title' => 'required|max:99',
            'formData.image' => 'mimes:jpg,jpeg,png,webp,bmp,tiff|max:1024',
        ], [
            'formData.title' => 'The title field is required.',
            'formData.title.max' => 'The title field must not exceed 99 characters.',
            'formData.image.required' => 'The image field is required.',
            'formData.image.mimes' => 'The image field must be a file of type: jpg,jpeg,png,bmp,tiff.',
            'formData.image.max' => 'The image field must not exceed 1MB.',
        ]);
        if ($this->course_id) {
            $course = Course::find($this->course_id);
            $course->update([
                'title' => $this->formData['title'],
                'description' => $this->formData['description'],
            ]);

            $image = @$this->formData['image']; // Store the video in the 'videos' directory
            if ($image) {
                // Attach the video to the model
                $course->clearMediaCollection('course-image');
                $course->addMedia($image)->toMediaCollection('course-image');
            }
            session()->flash('message', 'Course Updated Successfully.');
        }
        $this->closeModal();
        $this->resetInputFields();
    }

    public function deleteCourse($id)
    {
        Course::find($id)->delete();
        // Course::where('secondary_category_id', $id)->delete();
        $this->closeModal();
    }
}
