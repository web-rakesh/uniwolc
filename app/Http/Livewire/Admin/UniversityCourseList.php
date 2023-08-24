<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\ProgramExport;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\University\ProfileDetail;

class UniversityCourseList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem;
    public $universities, $select_university, $confirming;
    public $countries = [], $country_id, $states = [], $state_id, $cities = [], $city_id;


    public function render()
    {
        $this->universities = ProfileDetail::all();
        $this->countries = DB::table('countries')->get();
        if (!is_null($this->country_id)) {
            $this->states = DB::table('states')->where('country_id', $this->country_id)->get();
        }
        if (!is_null($this->state_id)) {
            $this->cities = DB::table('cities')->where('state_id', $this->state_id)->get();
        }

        $allCourses = Program::query()
            ->when($this->searchItem, function ($query, $search) {
                $query->where('program_title', 'LIKE', "%{$search}%");
            })

            ->when($this->select_university, function ($query) {
                return $query->whereHas('getUniversity', function ($query) {
                    return $query->where('user_id', $this->select_university);
                });
            })

            ->when($this->country_id, function ($query, $country_id) {
                $query->whereHas('getUniversity', function ($query) use ($country_id) {
                    return $query->where('country', $country_id);
                });
            })

            ->when($this->state_id, function ($query, $state_id) {
                $query->whereHas('getUniversity', function ($query) use ($state_id) {
                    return $query->where('state', $state_id);
                });
            })

            ->when($this->city_id, function ($query, $city_id) {
                $query->whereHas('getUniversity', function ($query) use ($city_id) {
                    return $query->where('city', $city_id);
                });
            })

            ->paginate(10);
        return view('livewire.admin.university-course-list', ['allCourses' => $allCourses]);
    }


    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        // dd($id);
        Program::destroy($id);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function courseExport()
    {
        return Excel::download(new ProgramExport, 'program.csv');
    }
}
