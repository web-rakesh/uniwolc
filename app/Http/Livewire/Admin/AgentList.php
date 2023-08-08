<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AgentList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem;
    public $confirming;

    public function render()
    {

        $agents = User::query()
            ->where('type', 1)
            ->when($this->searchItem, function ($query, $search) {
                $query->where('email', 'LIKE', "%{$search}%");
            })
            ->paginate(10);

        return view('livewire.admin.agent-list', ['agents' => $agents]);
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
            User::where('type', 1)->destroy($id);
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
