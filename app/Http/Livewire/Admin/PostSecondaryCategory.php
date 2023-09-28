<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\secondaryCategory;
use App\Models\secondarySubCategory;

class PostSecondaryCategory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0, $isSubCategoryOpen = 0, $isSubList= 0;
    public $category_id, $is_sub_category, $searchItem, $all_categories = [], $subCategory = [], $subLists = [];
    public $ms_category_id, $label, $sub_category_name;

    
    public function render()
    {
        $categories = secondaryCategory::query()
        ->when($this->searchItem, function($query ,$search){
            $query->where('name', 'LIKE', "%{$search}%");
        })
        ->paginate(10);
       
        return view('livewire.admin.post-secondary-category', ['categories' => $categories]);
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'label' => 'max:99',
        ]);
        secondaryCategory::Create([
            'name' => $this->label,
        ]);

        session()->flash('message',  'Category Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->label = '';
        $this->ms_category_id = '';
        $this->sub_category_name = '';
    }


    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
        $this->isSubCategoryOpen = false;
        $this->isSubList = false;
    }

    public function editCategory($id)
    {
        $category = secondaryCategory::findOrFail($id);
        $this->category_id = $category->id;
        $this->label = $category->name;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'label' => 'max:99',
        ]);
        if ($this->category_id) {
            $screen = secondaryCategory::find($this->category_id);
            $screen->update([
                'name' => $this->label,
            ]);
            session()->flash('message', 'Screen Updated Successfully.');
        }
        $this->closeModal();
        $this->resetInputFields();
    }

    public function deleteCategory($id)
    {
        secondaryCategory::find($id)->delete();
        secondarySubCategory::where('secondary_category_id',$id)->delete();
        $this->closeModal();
    }

    public function createSubCategory(){
        $this->isSubCategoryOpen = true;
        $this->all_categories = secondaryCategory::all();
    }

    public function subCategoryStore()
    {
        // dd('as');
        $this->validate([
            'ms_category_id' =>'required',
            'sub_category_name' => 'max:99',
        ]);
        // dd('as');
        secondarySubCategory::Create([
            'secondary_category_id' => $this->ms_category_id,
            'name' => $this->sub_category_name,
        ]);

        session()->flash('message',  'Sub Category Created Successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }



    public function subCategoryList($id)
    {
        $this->subLists = secondarySubCategory::where('secondary_category_id',$id)->get();
        
        $this->isSubList = true;
    }

    public function deleteSubCategory($id)
    {
        secondarySubCategory::find($id)->delete();
        $this->isSubList = false;
    }
}
