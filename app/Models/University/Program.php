<?php

namespace App\Models\University;

use Illuminate\Support\Str;
use App\Models\ProgramIntake;
use App\Models\EducationLevel;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Student\ApplyProgram;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Program extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'program_title',
        'slug',
        'post_secondary_category',
        'post_secondary_sub_category',
        'program_summary',
        'minimum_level_education',
        'minimum_gpa',
        'english_test',
        'average_scores',
        'ielt',
        'program_level',
        'program_length',
        'cost_of_living',
        'gross_tuition',
        'application_fee',
        'agent_commission',
        'deadline',
        'program_intake',
        'program_till_date',
        'program_language_test',
        'commission_breakdown',
        'disclaimer',
        'student_instruction',
        'copy_passport',
        'custodianship_declaration',
        'proof_immunization',
        'participation_agreement',
        'self_introduction'
    ];


    public function getUniversity()
    {
        return $this->hasMany(ProfileDetail::class, 'user_id', 'user_id');
    }
    public function university()
    {
        return $this->belongsTo(ProfileDetail::class, 'user_id', 'user_id');
    }

    public function getProgram()
    {
        return $this->hasMany(ApplyProgram::class, 'program_id');
    }

    public function minimumLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'minimum_level_education', 'id');
    }

    public function programLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'program_level', 'id');
    }

    public function getProgramTitleLimitAttribute()
    {
        return Str::words($this->program_title, '5');
    }

    public function intake()
    {
        return $this->hasMany(ProgramIntake::class, 'program_id');
    }
}
