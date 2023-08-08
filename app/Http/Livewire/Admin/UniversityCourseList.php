<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\ProgramExport;
use App\Models\University\Program;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\University\ProfileDetail;

class UniversityCourseList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem;
    public $universities, $select_university, $confirming;

    public function render()
    {
        $this->universities = ProfileDetail::all();
        $allCourses = Program::query()
            ->when($this->searchItem, function ($query, $search) {
                $query->where('program_title', 'LIKE', "%{$search}%");
            })

            ->when($this->select_university, function ($query) {
                return $query->whereHas('getUniversity', function ($query) {
                    return $query->where('user_id', $this->select_university);
                });
            })


            ->paginate(10);
        return view('livewire.admin.university-course-list', ['allCourses' => $allCourses]);
    }


    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        // dd($id);
        Program::destroy($id);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function courseExport()
    {
        return Excel::download(new ProgramExport, 'program.csv');
    }
}
