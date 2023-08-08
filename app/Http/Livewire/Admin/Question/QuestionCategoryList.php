<?php

namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Question\QuestionScreen;
use App\Models\Admin\Question\QuestionCategory;
use App\Models\Admin\Question\QuestionSubCategory;

class QuestionCategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0, $isSubCategoryOpen = 0;
    public $category_id, $searchItem, $subCategory = [], $screens = [];
    public $name, $table_name, $is_sub_category, $type, $screen_id;

    public function render()
    {
        $categories = QuestionCategory::latest()
            ->when($this->searchItem, function ($query, $search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })->paginate(10);
        // $categories = QuestionCategory::latest()->paginate(10);
        return view('livewire.admin.question.question-category-list', ['categories' => $categories]);
    }

    public function create()
    {
        $this->screens =  QuestionScreen::all();
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

    public function getSubCategory($id)
    {
        // dd($id);
        $this->subCategory = QuestionSubCategory::where('category_id', $id)->get();
        $this->isSubCategoryOpen = 1;
        // dd($this->isSubCategoryOpen);
        // dd($this->subCategory);
    }
    public function closeCategoryModal()
    {
        $this->isSubCategoryOpen = 0;
    }


    private function resetInputFields()
    {
        $this->name = '';
        $this->table_name = '';
        $this->is_sub_category = '';
    }

    public function store()
    {

        $this->validate([
            'name' => ['required', 'string', 'max:255'],


        ]);
        DB::beginTransaction();
        try {
            //code...

            $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'type' => ['required', 'string', 'max:255'],

            ]);

            QuestionCategory::create([
                'screen_id' => $this->screen_id,
                'name' => $this->name,
                'type' => $this->type,
                'has_sub_category' => (int) $this->is_sub_category,
                'table_name' => $this->table_name,
                'status' => 1

            ]);


            session()->flash(
                'message',
                'Category Created Successfully.'
            );

            $this->closeModal();
            $this->resetInputFields();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th->getMessage());
            session()->flash(
                'message',
                $th->getMessage()
            );
            DB::rollback();
        }
    }
    public function edit($id)
    {
        $category = QuestionCategory::findOrFail($id);
        $this->category_id = $id;
        $this->name  = $category->name;
        $this->is_sub_category  = $category->has_sub_category;
        $this->table_name = $category->table_name;

        $this->openModal();
    }

    public function update()
    {
        $agent = QuestionCategory::findOrFail($this->category_id);

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        DB::beginTransaction();
        try {
            //code...

            $agent->update([
                'name' => $this->name,
                'has_sub_category' => $this->is_sub_category,
                'table_name' => $this->table_name,
            ]);
            session()->flash(
                'message',
                'Category Updated Successfully.'
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

    public function delete($id)
    {
        $category = QuestionCategory::findOrFail($id);
        $category->delete();
        session()->flash('message', 'category Deleted Successfully.');
    }
}
