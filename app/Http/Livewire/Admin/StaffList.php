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


        $staffs = Staff::query()
            ->when($this->searchItem, function ($query, $search) {
                $query->where('email', 'LIKE', "%{$search}%");
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

    public function updatedCountryId()
    {
        $this->state_id = [];
        $this->city_id = [];
    }
}
