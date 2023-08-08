<?php

namespace App\Http\Livewire\University;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student\ApplyProgram;

class ProgramApplyList extends Component
{

    use WithPagination;

    public $searchItem;

    public $paginationCount = 10;
    public function render()
    {

        $applies = ApplyProgram::whereHas('getProgram.getUniversity', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })

            ->when($this->searchItem, function ($query, $searchItem) {
                $query->where('program_title', 'LIKE', "%{$searchItem}%");
            })
            ->paginate($this->paginationCount);


        // dd($applies);
        return view('livewire.university.program-apply-list', ['applies' => $applies]);
    }
}
