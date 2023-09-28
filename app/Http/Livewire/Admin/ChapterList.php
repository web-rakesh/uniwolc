<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use App\Models\Chapter;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ChapterList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0;
    public $formData = [], $chapter_id, $searchItem, $course_id;


    public function render()
    {
        $courses = Course::all();
        // $chapters = Chapter::latest()->paginate(10);
        $chapters = Chapter::query()
            ->when($this->searchItem, function ($query) {
                $query->where('title', 'like', '%' . $this->searchItem . '%');
            })
            ->when($this->course_id, function ($query) {
                $query->whereHas('getCourse', function ($query1) {
                    $query1->where('id', $this->course_id);
                });
            })
            ->latest()
            ->paginate(10);
        return view('livewire.admin.chapter-list', ['chapters' => $chapters, 'courses' => $courses]);
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
        ], [
            'formData.title' => 'The title field is required.',
            'formData.course_id' => 'The title field is required.',
            'formData.title.max' => 'The title field must not exceed 99 characters.',
        ]);

        // dd($this->formData);

        try {
            //code...
            DB::beginTransaction();

            $chapter = Chapter::Create([
                'course_id' => $this->formData['course_id'],
                'title' => $this->formData['title'],
                'content' => $this->formData['content'],
            ]);
            session()->flash('message',  'Chapter Created Successfully.');

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

    public function editChapter($id)
    {
        $chapters = Chapter::findOrFail($id);
        // dd($chapters->toArray());
        $this->chapter_id = $id;
        $this->formData = $chapters->toArray();
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'formData.title' => 'required|max:99',
            'formData.course_id' => 'required',
        ], [
            'formData.title' => 'The title field is required.',
            'formData.course_id' => 'The title field is required.',
            'formData.title.max' => 'The title field must not exceed 99 characters.',
        ]);
        if ($this->chapter_id) {
            $chapter = Chapter::find($this->chapter_id);
            $chapter->update([
                'course_id' => $this->formData['course_id'],
                'title' => $this->formData['title'],
                'content' => $this->formData['content'],
            ]);
            session()->flash('message', 'Chapter Updated Successfully.');
        }
        $this->closeModal();
        $this->resetInputFields();
    }

    public function deleteChapter($id)
    {
        try {
            //code...
            Chapter::find($id)->delete();
            $this->closeModal();
            session()->flash('message', 'Chapter Delete Successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('message', 'Something went wrong.');
        }
    }
}
