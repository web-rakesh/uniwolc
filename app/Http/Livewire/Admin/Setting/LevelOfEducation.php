<?php

namespace App\Http\Livewire\Admin\Setting;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EducationLevel;
use Illuminate\Support\Facades\DB;
use App\Models\CategoriesOfEducation;

class LevelOfEducation extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem;
    public $isOpen = false, $confirming;
    public $categories, $category_id, $level_name, $level_id;

    public function render()
    {
        $this->categories = CategoriesOfEducation::all();
        $levelOfEducation = EducationLevel::query()

            ->when($this->searchItem, function ($query, $search) {
                $query->where('level_name', 'LIKE', "%{$search}%");
            })

            ->when($this->category_id, function ($query) {
                return $query->whereHas('categoriesOfEducation', function ($query) {
                    return $query->where('id', $this->category_id);
                });
            })

            ->paginate(10);

        return view('livewire.admin.setting.level-of-education', [
            'levelOfEducation' => $levelOfEducation
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->level_name = '';
        $this->category_id = '';
    }

    public function store()
    {
        $this->validate([
            'level_name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'string', 'max:255'],
        ]);
        DB::beginTransaction();
        try {
            //code...
            EducationLevel::create([
                'level_name' => $this->level_name,
                'category_id' => $this->category_id,
            ]);
            session()->flash(
                'message',
                'Education Level Created Successfully.'
            );
            $this->closeModal();
            $this->resetInputFields();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash(
                'message',
                $th->getMessage()
            );
            DB::rollback();
        }
    }
    public function edit($id)
    {
        $education = EducationLevel::findOrFail($id);
        $this->level_id = $id;
        $this->level_name  = $education->level_name;
        $this->category_id  = $education->category_id;

        $this->openModal();
    }

    public function update()
    {
        // dd($this->category_id);
        $education = EducationLevel::findOrFail($this->level_id);

        $this->validate([
            'level_name' => ['required', 'string', 'max:255'],
            'category_id' => ['required'],
        ]);
        DB::beginTransaction();
        try {
            //code...

            $education->update([
                'level_name' => $this->level_name,
                'category_id' => (int) $this->category_id,

            ]);
            session()->flash(
                'message',
                'Agent Updated Successfully.'
            );
            $this->closeModal();
            $this->resetInputFields();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash(
                'message',
                $th->getMessage()
            );
            DB::rollback();
        }
    }


    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        try {
            //code...
            DB::beginTransaction();
            EducationLevel::destroy($id);
            session()->flash('message', 'Education Level Deleted Successfully.');
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            session()->flash(
                'message',
                $th->getMessage()
            );
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

}
