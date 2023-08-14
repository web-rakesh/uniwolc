<?php

namespace App\Http\Livewire\Admin\Application;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\ApplypogramExport;
use App\Models\Student\ApplyProgram;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student\StudentDetail;
use App\Models\University\ProfileDetail;

class ApplicationList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem, $universities, $universityId, $students, $studentId, $pay_status;
    public $applications, $label;

    public function render()
    {
        // dd($this->applications);
        $this->students = StudentDetail::all();
        $this->universities = ProfileDetail::all();
        $programs = ApplyProgram::query()
            ->when($this->applications, function ($query, $applications) {
                $query->where('program_status',  $applications);
            })
            ->when($this->pay_status, function ($query, $search) {
                $query->where('status',  $search);
            })
            ->when($this->searchItem, function ($query, $search) {
                $query->where('program_title', 'LIKE', "%{$search}%");
            })
            ->when($this->studentId, function ($query) {
                return $query->whereHas('getStudent', function ($query) {
                    return $query->where('user_id', $this->studentId);
                });
            })
            ->when($this->universityId, function ($query) {
                return $query->whereHas('getProgram.university', function ($query) {
                    return $query->where('id', $this->universityId);
                });
            })

            ->paginate(10);
        return view('livewire.admin.application.application-list', ['programs' => $programs]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function applyProgramExport()
    {
        // dd(time());
        return Excel::download(new ApplypogramExport, time() . '-apply-program.csv');
    }
}
