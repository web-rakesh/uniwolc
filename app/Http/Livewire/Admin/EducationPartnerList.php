<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EducationPartner;
use Illuminate\Support\Facades\DB;

class EducationPartnerList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem;
    public $confirming;

    public function render()
    {
        $partners = EducationPartner::query()
            ->when($this->searchItem, function ($query, $search) {
                $query->where('email', 'LIKE', "%{$search}%");
                $query->orWhere('school_name', 'LIKE', "%{$search}%");
                $query->orWhere('name', 'LIKE', "%{$search}%");
            })
            ->paginate(10);
        return view('livewire.admin.education-partner-list', compact('partners'));
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
            EducationPartner::destroy($id);
            session()->flash('message', 'Education Partner Deleted Successfully.');
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
}
