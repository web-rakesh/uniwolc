<?php

namespace App\Models\University;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class ProfileDetail extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'university_profile_details';

    protected $fillable = [
        'user_id',
        'university_name',
        'slug',
        'phone_number',
        'email',
        'country',
        'state',
        'city',
        'permit_visa',
        'address',
        'about_university',
        'feature',
        'location',
        'home_stay',
        'founded',
        'school_id',
        'provider_id_number',
        'institution_type',
        'cost_duration',
        'application_fee',
        'average_graduate_program',
        'average_undergraduate_program',
        'cost_of_living',
        'gross_tuition',
        'program_level',
        'blocked_country',
        'letter_of_acceptance',
        'disciplines'
    ];

    protected $appends = ["university_gallery_url"];

    public function getUniversityGalleryUrlAttribute()
    {
        return $this->getFirstMediaUrl('university-picture');
    }

    public function getProgram()
    {
        return $this->hasMany(Program::class, 'user_id', 'user_id');
    }

    public function getCountry()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country', 'id');
    }

    public function getState()
    {
        return $this->belongsTo(\App\Models\State::class, 'state', 'id');
    }

    public function getCity()
    {
        return $this->belongsTo(\App\Models\City::class, 'city', 'id');
    }
}
