<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentDetail;

class StudentList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchItem = '', $paginationCount = 10;
    public function render()
    {
        $student = StudentDetail::where('staff_id', Auth::user()->id)
            ->when($this->searchItem, function ($query, $search) {
                $query->where('first_name', 'LIKE', "%{$search}%");
                $query->orWhere('last_name', 'LIKE', "%{$search}%");
                $query->orWhere('email', 'LIKE', "%{$search}%");
                $query->orWhere('country', 'LIKE', "%{$search}%");
                $query->orWhere('address', 'LIKE', "%{$search}%");
            })
            ->paginate($this->paginationCount);
        return view('livewire.staff.student-list', ['students' => $student]);
    }
}
