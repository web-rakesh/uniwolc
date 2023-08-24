<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\StudentsExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student\StudentDetail;

class StudentList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
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


        $students = StudentDetail::query()
            ->when($this->search, function ($query, $search) {
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
            ->latest()
            ->paginate(10);
        // dd($students);
        return view('livewire.admin.student-list', ['students' => $students]);
    }


    public function studentExport()
    {
        return Excel::download(new StudentsExport, 'student-collection.csv');
        dd('work');
    }
}
