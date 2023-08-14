<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student\StudentDetail;

class StudentList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {

        $students = StudentDetail::query()
            ->when($this->search, function ($query, $search) {
                $query->where('email', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(10);
        // dd($students);
        return view('livewire.admin.student-list', ['students' => $students]);
    }


    public function studentExport()
    {
        return Excel::download(new StudentsExport, 'student-collection.csv');
        dd('work');
    }
}
