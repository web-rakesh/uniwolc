<?php

namespace App\Http\Livewire\Admin\Application;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\ApplypogramExport;
use App\Models\Student\ApplyProgram;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student\StudentDetail;
use App\Models\University\ProfileDetail;

class ApplicationList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItem, $universities, $universityId, $students, $studentId, $pay_status;
    public $applications, $label;
    public $countries = [], $country_id, $states = [], $state_id, $cities = [], $city_id;



    public function render()
    {
        $universityCountry = $this->country_id;
        $universityState = $this->state_id;
        $universityCity = $this->city_id;

        $this->countries = Country::all();
        if (!is_null($this->country_id)) {
            $this->states = State::where('country_id', $this->country_id)->get();
        }
        if (!is_null($this->state_id)) {
            $this->cities = City::where('state_id', $this->state_id)->get();
        }
        $this->students = StudentDetail::all();
        $this->universities = ProfileDetail::all();
        $programs = ApplyProgram::query()
            ->when($this->applications, function ($query, $applications) {
                $query->where('program_status',  $applications);
            })
            ->when($this->pay_status, function ($query, $search) {
                $query->where('status',  $search);
            })
            ->when($this->searchItem, function ($query, $search) {
                $query->where('program_title', 'LIKE', "%{$search}%");
            })
            ->when($this->studentId, function ($query) {
                return $query->whereHas('getStudent', function ($query) {
                    return $query->where('user_id', $this->studentId);
                });
            })
            ->when($this->universityId, function ($query) {
                return $query->whereHas('getProgram.university', function ($query) {
                    return $query->where('id', $this->universityId);
                });
            })

            ->when($this->country_id, function ($query) use ($universityCountry) {
                return $query->whereHas('getProgram.university', function ($query) use ($universityCountry) {
                    return $query->where('country', $universityCountry);
                });
            })
            ->when($this->state_id, function ($query) use ($universityState) {
                return $query->whereHas('getProgram.university', function ($query) use ($universityState) {
                    return $query->where('state', $universityState);
                });
            })
            ->when($this->city_id, function ($query) use ($universityCity) {
                return $query->whereHas('getProgram.university', function ($query) use ($universityCity) {
                    return $query->where('city', $universityCity);
                });
            })

            ->paginate(10);
        return view('livewire.admin.application.application-list', ['programs' => $programs]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function applyProgramExport()
    {
        // dd(time());
        return Excel::download(new ApplypogramExport, time() . '-apply-program.csv');
    }
}
