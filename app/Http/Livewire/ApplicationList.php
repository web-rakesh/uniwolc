<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student\ApplyProgram;
use Illuminate\Support\Facades\Auth;

class ApplicationList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $appId, $studentName, $schoolName, $programName, $startDate, $programFees;
    public $applications, $programStatus;

    public function render()
    {
        $applyPrograms = ApplyProgram::query();
        if (Auth::user()->type == 'agent') {
            $applyPrograms =  $applyPrograms->whereAgentId(Auth::user()->id);
            if ($this->programStatus != '') {
                if ($this->programStatus != 0) {
                    $applyPrograms = $applyPrograms->where('program_status', $this->programStatus);
                }
            } else {
                $applyPrograms = $applyPrograms->where('status', $this->applications);
            }
        } else {
            $applyPrograms = $applyPrograms->whereStaffId(Auth::user()->id);
            if ($this->programStatus != '') {
                if ($this->programStatus != 0) {
                    $applyPrograms = $applyPrograms->where('program_status', $this->programStatus);
                }
            } else {
                $applyPrograms = $applyPrograms->where('status', $this->applications);
            }
        }
        $applyPrograms = $applyPrograms->latest()
            ->when($this->programFees, function ($query, $programFees) {
                return $query->where('fees', 'like', '%' . $programFees . '%');
            })
            ->when($this->appId, function ($query, $appId) {
                return $query->where('application_number', 'like', '%' . $appId . '%');
            })
            ->when($this->startDate, function ($query, $startDate) {
                return $query->whereDate('created_at', '>=', $startDate);
            })
            ->when($this->programName, function ($query, $programName) {
                return $query->whereHas('getProgram', function ($query) use ($programName) {
                    $query->where('program_title', 'like', '%' . $programName . '%');
                });
            })
            ->when($this->studentName, function ($query, $studentName) {
                return $query->whereHas('getStudent', function ($query) use ($studentName) {
                    $query->whereRaw("concat(first_name, ' ', last_name) like '%" . addslashes($studentName) . "%' ");
                });
            })
            ->paginate(10);
        return view('livewire.application-list', ['applyPrograms' => $applyPrograms]);
    }
}
