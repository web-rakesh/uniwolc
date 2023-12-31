<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class StudentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'student_id',
        'email',
        'country_code',
        'mobile_number',
        'alt_country_code',
        'alt_mobile_number',
        'country',
        'state',
        'address',
        'city',
        'pincode',
        'passport_number',
        'passport_expiry_date',
        'marital_status',
        'gender',
        'dob',
        'fast_language',
        'website',
        'twitter',
        'instagram',
        'facebook',
        'agent_id',
        'staff_id',
        'status'
    ];

    function getFullNameAttribute()
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }

    public function educationDetail()
    {
        return $this->belongsTo(EducationSummary::class, 'user_id', 'user_id');
    }

    public function englishTest()
    {
        return $this->belongsTo(TestScore::class, 'user_id', 'user_id');
    }

    public function staffDetail()
    {
        return $this->belongsTo(\App\Models\User::class, 'staff_id', 'id');
    }

    public function agentDetail()
    {
        return $this->belongsTo(\App\Models\User::class, 'agent_id', 'id');
    }


    public function applied_student_programs()
    {
        return $this->hasMany(\App\Models\Student\ApplyProgram::class, 'user_id', 'id');
    }


    public function userCountry()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country', 'id');
    }

    public function userState()
    {
        return $this->belongsTo(\App\Models\State::class, 'state', 'id');
    }

    public function userCity()
    {
        return $this->belongsTo(\App\Models\City::class, 'city', 'id');
    }
}
