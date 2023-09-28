<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Chapter;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class LessonList extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0;
    public $formData = [], $chapter_id, $searchItem, $course_id, $lesson_id, $courseId, $chapterId;

    public $courses, $chapters = [], $selectedCourse;



    public function render()
    {
        // dd($this->courseId);
        $lessons = Lesson::query()
            ->when($this->searchItem, function ($query) {
                $query->where('title', 'like', '%' . $this->searchItem . '%');
            })
            ->when($this->courseId, function ($query) {
                $query->whereHas('getCourse', function ($query1) {
                    $query1->where('id', $this->courseId);
                });
            })
            ->when($this->chapterId, function ($query) {
                $query->whereHas('getChapter', function ($query1) {
                    $query1->where('id', $this->chapterId);
                });
            })
            ->latest()
            ->paginate(10);
        return view('livewire.admin.lesson-list', ['lessons' => $lessons,]);
    }

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function updatedSelectedCourse($corseId)
    {
        $this->formData['course_id'] = $corseId;
        $this->chapters = Chapter::where('course_id', $corseId)->get();
    }

    public function updatedCourseId($corseId)
    {
        $this->formData['course_id'] = $corseId;
        $this->chapters = Chapter::where('course_id', $corseId)->get();
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
            'formData.course_id' => 'required',
            'formData.video' => 'mimes:mp4|max:10240', // 10MB max for example
        ], [
            'formData.title' => 'The title field is required.',
            'formData.course_id' => 'The title field is required.',
            'formData.title.max' => 'The title field must not exceed 99 characters.',
            'formData.video.required' => 'The video field is required.',
            'formData.video.mimes' => 'The video field must be a file of type: mp4.',
            'formData.video.max' => 'The video field must not exceed 10MB.',
        ]);

        // dd($this->formData);

        try {
            //code...
            DB::beginTransaction();

            $lesson = Lesson::Create([
                'course_id' => $this->formData['course_id'],
                'chapter_id' => $this->formData['chapter_id'],
                'title' => $this->formData['title'],
                'content' => $this->formData['content'],
            ]);

            $video = @$this->formData['video']; // Store the video in the 'videos' directory
            if ($video) {
                // Attach the video to the model
                $lesson->addMedia($video)->toMediaCollection('course-lesson-video');
            }


            session()->flash('message',  'Lesson Created Successfully.');

            $this->closeModal();
            $this->resetInputFields();

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
            session()->flash('message',  'Something went wrong.');
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

    public function editLesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        $this->chapters = Chapter::where('course_id', $lesson->course_id)->get();
        // dd($this->chapters);
        $this->formData['chapter_id'] = $lesson->chapter_id;
        $this->lesson_id = $id;
        $this->selectedCourse = $lesson->course_id;
        $this->formData = $lesson->toArray();
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'formData.title' => 'required|max:99',
            'formData.course_id' => 'required',
            'formData.video' => 'mimes:mp4|max:10240', // 10MB max for example
        ], [
            'formData.title' => 'The title field is required.',
            'formData.course_id' => 'The title field is required.',
            'formData.title.max' => 'The title field must not exceed 99 characters.',
            'formData.video.required' => 'The video field is required.',
            'formData.video.mimes' => 'The video field must be a file of type: mp4.',
            'formData.video.max' => 'The video field must not exceed 10MB.',
        ]);

        if ($this->lesson_id) {
            $chapter = Lesson::find($this->lesson_id);
            // dd($chapter);
            $chapter->update([
                'course_id' => $this->formData['course_id'],
                'chapter_id' => $this->formData['chapter_id'],
                'title' => $this->formData['title'],
                'content' => $this->formData['content'],
            ]);
            $video = @$this->formData['video']; // Store the video in the 'videos' directory
            if ($video) {
                // Attach the video to the model
                $chapter->clearMediaCollection('course-lesson-video');
                $chapter->addMedia($video)->toMediaCollection('course-lesson-video');
            }
            session()->flash('message', 'Lesson Updated Successfully.');
        }
        $this->closeModal();
        $this->resetInputFields();
    }

    public function deleteChapter($id)
    {
        $chapter = Chapter::find($id);
        if ($chapter) {
            $chapter->clearMediaCollection('course-chapter-video');
        }
        $chapter->delete();
        $this->closeModal();
        session()->flash('message', 'Chapter Delete Successfully.');
    }
}
