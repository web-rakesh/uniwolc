<?php

namespace App\Http\Livewire\Admin;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\StaffsExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StaffList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem;
    public $confirming;
    public function render()
    {
        $staffs = Staff::query()
            ->when($this->searchItem, function ($query, $search) {
                $query->where('email', 'LIKE', "%{$search}%");
            })
            ->paginate(10);
        return view('livewire.admin.staff-list', ['staffs' => $staffs]);
    }

    public function staffExport()
    {
        return Excel::download(new StaffsExport, 'staffs.csv');
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
            Staff::destroy($id);
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
}
