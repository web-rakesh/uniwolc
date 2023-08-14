<?php

namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Question\QuestionCategory;
use App\Models\Admin\Question\QuestionSubCategory;

class QuestionSubCategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0, $isEditOpen = 0, $confirming;
    public $category_id, $searchItem, $getCategories = [];
    public $subCategoryArray = [], $sub_category_name;
    public $name, $table_name, $is_sub_category, $selectCategory;
    public function render()
    {
        $this->getCategories = QuestionCategory::all();
        $subCategory = QuestionSubCategory::latest()->paginate(10);
        return view('livewire.admin.question.question-sub-category-list', [
            'subCategory' => $subCategory
        ]);
    }

    public function addSubCategory()
    {
        $this->subCategoryArray[] = '';
    }

    public function removeSubCategory($index)
    {
        unset($this->subCategoryArray[$index]);
        $this->subCategoryArray = array_values($this->subCategoryArray);
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
        $this->isEditOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->subCategoryArray = [];
    }

    public function store()
    {

        DB::beginTransaction();
        try {
            //code...
            foreach ($this->subCategoryArray as $key => $value) {
                QuestionSubCategory::create([
                    'category_id' => (int)$this->selectCategory,
                    'name' => $value,
                    'status' => 0
                ]);
            }
            session()->flash(
                'message',
                'Sub Category Created Successfully.'
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
        $category = QuestionSubCategory::findOrFail($id);
        $this->selectCategory = $category->category_id;
        $this->category_id = $id;
        $this->sub_category_name  = $category->name;
        $this->isEditOpen = true;
    }

    public function update()
    {
        $agent = QuestionSubCategory::findOrFail($this->category_id);

        $this->validate([
            'sub_category_name' => ['required', 'string', 'max:255'],
        ]);
        DB::beginTransaction();
        try {
            //code...

            $agent->update([
                'name' => $this->sub_category_name,
                'category_id ' => $this->selectCategory,
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


    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        $category = QuestionSubCategory::findOrFail($id);
        $category->delete();
        session()->flash('message', 'category Deleted Successfully.');
    }
}
