<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Livewire\Component;
use App\Models\ManageSubAdmin;
use Illuminate\Support\Facades\DB;

class ManageSubAdminList extends Component
{
    public $searchItem = '', $confirming;
    public function render()
    {
        $subAdmins = Admin::query()
            ->where('is_admin', 0)
            ->when($this->searchItem, function ($query, $search) {
                $query->where('email', 'LIKE', "%{$search}%");
                $query->orWhere('name', 'LIKE', "%{$search}%");
            })
            ->paginate(10);
        return view('livewire.admin.manage-sub-admin-list', ['subAdmins' => $subAdmins]);
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
            Admin::destroy($id);
            session()->flash('message', 'Sub Admin Deleted Successfully.');
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
