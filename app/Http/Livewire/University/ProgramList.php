<?php

namespace App\Http\Livewire\University;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\University\Program;

class ProgramList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchItem;

    public $paginationCount = 10;

    public function render()
    {
        $programs = Program::query()
            ->where('user_id', auth()->user()->id)
            ->when($this->searchItem, function ($query, $searchItem) {
                $query->where('program_title', 'LIKE', "%{$searchItem}%");
                $query->orWhere('minimum_level_education', 'LIKE', "%{$searchItem}%");
            })
            ->latest()
            ->paginate($this->paginationCount);
        // $programs = Program::where('user_id', auth()->user()->id)->latest()->paginate($this->paginationCount);
        return view('livewire.university.program-list', ['programs' => $programs]);
    }
}
