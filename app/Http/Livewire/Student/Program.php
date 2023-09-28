<?php

namespace App\Http\Livewire\Student;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GradingScheme;
use App\Models\EducationLevel;
use App\Models\University\ProfileDetail;
use App\Models\University\Program as ProgramSchool;

class Program extends Component
{
    use WithPagination;
    public $programs, $countries, $educationLevels, $gradingSchemes;
    public $education_level, $visa_permit, $grading_average, $program_level, $schoolType = [];
    public $studies, $schoolOrLocation, $school_short;
    // school filter
    public $schoolCountry;
    public $searchStatus = false;


    public function render()
    {
        $this->countries = Country::where('block', '!=', 1)->get();
        $this->educationLevels = EducationLevel::all();
        $this->gradingSchemes = GradingScheme::all();
        if ($this->searchStatus == false) {

            $this->programs = ProgramSchool::query()
                ->latest()
                ->when($this->school_short, function ($query, $school_short) {
                    // dd($school_short);
                    if ($school_short == 'tuition_l_h') {
                        $query->orderBy('gross_tuition', 'asc');
                    } elseif ($school_short == 'tuition_h_l') {
                        $query->orderBy('gross_tuition', 'desc');
                    } elseif ($school_short == 'application_fee_l_h') {
                        $query->orderBy('application_fee', 'asc');
                    } elseif ($school_short == 'application_fee_h_l') {
                        $query->orderBy('application_fee', 'desc');
                    } else {
                    }
                })
                ->latest()
                ->take(25)
                ->get();
            // dd($this->programs);
        } else {
            $this->searchStatus = false;
            $this->programs = ProgramSchool::query()
                ->latest()
                ->when($this->studies, function ($query, $search) {

                    $query->where('program_level', 'LIKE', "%{$search}%");
                })
                ->when($this->schoolOrLocation, function ($query, $schoolOrLocation) {
                    $query->whereHas('university', function ($query) use ($schoolOrLocation) {
                        $query->where('university_name', 'LIKE', "%{$schoolOrLocation}%");
                        $query->orWhere('location', 'LIKE', "%{$schoolOrLocation}%");
                    });
                })
                ->when($this->schoolCountry, function ($query, $schoolCountry) {
                    $query->whereHas('university', function ($query) use ($schoolCountry) {
                        $query->where('country', 'LIKE', "%{$schoolCountry}%");
                    });
                })
                ->when($this->studies, function ($query, $search) {
                    $query->where('program_level', 'LIKE', "%{$search}%");
                })
                ->when($this->education_level, function ($query, $education_level) {
                    // dd($this->education_level);
                    $query->where('minimum_level_education', (int)$education_level);
                })
                ->when($this->grading_average, function ($query, $grading_average) {
                    $query->where('minimum_gpa', 'LIKE', "%{$grading_average}%");
                })
                ->when($this->program_level, function ($query, $program_level) {
                    $query->where('program_level', (int)$program_level);
                })

                ->when($this->visa_permit, function ($query, $visa_permit) {

                    $query->whereHas('getUniversity', function ($query) use ($visa_permit) {
                        $query->where('permit_visa', 'LIKE', "%{$visa_permit}%");
                    });
                })
                ->when($this->schoolType, function ($query, $schoolType) {
                    $query->whereHas('getUniversity', function ($query) use ($schoolType) {
                        foreach ($schoolType as $key => $keyword) {
                            if ($key == 0) {
                                $query->where('institution_type', 'LIKE', "%{$keyword}%");
                            } else {
                                $query->orWhere('institution_type', 'LIKE', "%{$keyword}%");
                            }
                        }
                    });
                })
                ->latest()
                ->take(25)
                ->get();
        }


        $this->searchStatus = false;

        $school = ProfileDetail::latest()->take(50)->get();
        $schoolCount = ProfileDetail::count();
        // dd($educationLevel);
        return view('livewire.student.program', ['schools' => $school, 'schoolCount' => $schoolCount]);
    }



    public function eligibilitySearch()
    {
        $this->searchStatus = true;
    }

    public function clearFilter()
    {
        $this->studies == null;
        $this->schoolOrLocation == null;
        $this->education_level == null;
        $this->visa_permit == null;
        $this->grading_average == null;
        $this->program_level == null;
        $this->schoolType = [];
        $this->searchStatus = false;
    }
}
