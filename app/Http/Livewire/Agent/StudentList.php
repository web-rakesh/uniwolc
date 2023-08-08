<?php

namespace App\Http\Livewire\Agent;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentDetail;

class StudentList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $staffs;
    public $searchItem = '', $selectedItem, $paginationCount = 10;
    public function render()
    {
        $this->staffs = Staff::where('agent_id', Auth::user()->id)->get();
        $student = StudentDetail::with('staffDetail')->where('agent_id', Auth::user()->id)
            ->when($this->searchItem, function ($query, $search) {
                $query->where('first_name', 'LIKE', "%{$search}%");
                $query->orWhere('last_name', 'LIKE', "%{$search}%");
                $query->orWhere('email', 'LIKE', "%{$search}%");
                $query->orWhere('country', 'LIKE', "%{$search}%");
                $query->orWhere('address', 'LIKE', "%{$search}%");
            })
            ->when($this->selectedItem, function ($query, $selected) {

                $query->where('staff_id', $selected);
            })
            ->latest()
            ->paginate($this->paginationCount);

        return view('livewire.agent.student-list', ['students' => $student]);
    }
}
