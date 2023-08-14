<?php

namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Admin\Question\QuestionCategory;
use App\Models\Admin\Question\QuestionScreen as Screen;

class QuestionScreen extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0, $isSubCategoryOpen = 0, $isCategory = 0;
    public $screen_id, $is_sub_category, $searchItem, $category = [], $subCategory = [], $screens = [];
    public $description, $label;

    public function render()
    {
        $screens = Screen::with('category', 'category.subCategory')->orderBy('sequence_no', 'asc')->paginate(10);
        // dd($screens);
        return view('livewire.admin.question.question-screen', ['quesScreens' => $screens]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'description' => 'max:255',
            'label' => 'max:99',
        ]);
        $lastSequence = Screen::orderBy('sequence_no', 'desc')->first();
        Screen::Create([
            'label' => $this->label,
            'description' => $this->description,
            'sequence_no' => $lastSequence->sequence_no + 1
        ]);

        session()->flash('message', $this->category_id ? 'Screen Updated Successfully.' : 'Screen Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->label = '';
        $this->description = '';
    }


    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function editScreen($id)
    {
        $screen = Screen::findOrFail($id);
        $this->screen_id = $screen->id;
        $this->label = $screen->label;
        $this->description = $screen->description;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'description' => 'max:255',
            'label' => 'max:99',
        ]);
        if ($this->screen_id) {
            $screen = Screen::find($this->screen_id);
            $screen->update([
                'label' => $this->label,
                'description' => $this->description,
            ]);
            session()->flash('message', 'Screen Updated Successfully.');
        }
        $this->closeModal();
        $this->resetInputFields();
    }
}
