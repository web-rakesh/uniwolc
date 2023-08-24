<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\UniversityExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\University\ProfileDetail;

class UniversityList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search, $confirming;
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

        $university = ProfileDetail::query()
            ->with('getCountry')
            ->when($this->search, function ($query, $search) {
                $query->where('university_name', 'LIKE', "%{$search}%");
                $query->orWhere('email', 'LIKE', "%{$search}%");
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
        return view('livewire.admin.university-list', ['university' => $university]);
    }

    public function universityExport()
    {
        return Excel::download(new UniversityExport, 'university.csv');
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
            ProfileDetail::destroy($id);
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
