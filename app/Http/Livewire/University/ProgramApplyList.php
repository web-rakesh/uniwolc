<?php

namespace App\Http\Livewire\University;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use App\Models\University\Program;
use App\Models\Student\ApplyProgram;

class ProgramApplyList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchItem;

    public $paginationCount = 10;
    public $programList, $programSelectId, $startDate, $endDate;
    public function render()
    {

        $applies = ApplyProgram::query()
            ->where('status', 1)
            ->whereHas('getProgram.getUniversity', function ($q) {
                $q->where('user_id', auth()->user()->id);
            })
            ->when($this->searchItem, function ($query, $searchItem) {
                $query->where('program_title', 'LIKE', "%{$searchItem}%");
                if (str_contains($searchItem, 'UW') && strlen($searchItem) > 2) {
                    $query->orWhere('application_number', 'LIKE', "%{$searchItem}%");
                }
            })
            ->when($this->programSelectId, function ($query, $programSelectId) {
                $query->where('program_id', $programSelectId);
            })
            ->whereBetween('created_at', [
                !empty($this->startDate) ? Carbon::parse($this->startDate)->startOfDay() : Carbon::now()->subMonth(), // Default to one month ago if not provided
                !empty($this->endDate) ?  Carbon::parse($this->endDate)->endOfDay() : Carbon::now(),
            ])
            ->latest()
            ->paginate($this->paginationCount);
        $this->programList = Program::select('id', 'program_title')->where('user_id', auth()->user()->id)->get();

        return view('livewire.university.program-apply-list', ['applies' => $applies]);
    }

    public function clearDate()
    {
        $this->startDate = null;
        $this->endDate = null;
    }
}
