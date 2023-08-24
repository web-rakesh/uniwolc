<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\AgentProfile;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AgentList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem;
    public $confirming;
    public $countries = [], $country_id, $states = [], $state_id, $cities = [], $city_id;


    public function render()
    {

        $this->countries = DB::table('countries')->get();
        if (!is_null($this->country_id)) {
            $this->states = DB::table('states')->where('country_id', $this->country_id)->get();
        }
        if (!is_null($this->state_id)) {
            $this->cities = DB::table('cities')->where('state_id', $this->state_id)->get();
        }

        $agents = AgentProfile::query()
            ->when($this->searchItem, function ($query, $search) {
                $query->where('email', 'LIKE', "%{$search}%");
                $query->orWhere('name', 'LIKE', "%{$search}%");
                $query->orWhere('agent_id', 'LIKE', "%{$search}%");
            })
            ->when($this->country_id, function ($query, $country_id) {
                $query->where('country', $country_id);
            })
            ->when($this->state_id, function ($query, $state_id) {
                $query->where('state', $state_id);
            })
            ->when($this->city_id, function ($query, $city_id) {
                $query->where('city', $city_id);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.agent-list', ['agents' => $agents]);
    }


    #Update the City status Priority
    public function changeStatus(AgentProfile $agent, $priority_check)
    {
        if ($priority_check == 1) {
            $priority_check = 0;
        } else {
            $priority_check = 1;
        }
        // dd($agent);
        // dd($priority_check);
        $agent->update(['is_verify' => $priority_check]);
        $this->dispatchBrowserEvent('hide-directory-form');
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
