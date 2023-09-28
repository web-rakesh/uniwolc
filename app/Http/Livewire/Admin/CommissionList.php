<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Admin\SchoolCommission;
use App\Models\University\ProfileDetail;

class CommissionList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0, $isSubCategoryOpen = 0, $isSubList = 0;
    public $category_id, $is_sub_category, $searchItem, $all_categories = [], $subCategory = [], $subLists = [];
    public $ms_category_id, $label, $sub_category_name;
    public $universities = [], $form = [];


    public function render()
    {
        $this->universities = ProfileDetail::latest()->get();
        $commissions = SchoolCommission::latest()->get();
        return view('livewire.admin.commission-list', [
            'commissions' => $commissions,
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        // dd($this->form);
        // $this->validate([
        //     'label' => 'max:99',
        // ]);
        SchoolCommission::Create([
            'school_id' => $this->form['school'],
            'applicable' => $this->form['applicable'],
            'min' => $this->form['min'],
            'max' => $this->form['max'],
            'payment_type' => $this->form['payment_type'],
            'tax_type_percentage' => $this->form['tax_type_percentage'],
            'variable_factor' => $this->form['variable_factor'],
            'installment_pay_out' => $this->form['installment_pay_out'],
        ]);

        session()->flash('message',  'Category Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->form = [];
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

}
