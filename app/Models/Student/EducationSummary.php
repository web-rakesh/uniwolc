<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'education_country',
        'education_level',
        'education_scheme_grade',
        'education_average_grade',
        'agent_id',
        'staff_id',
        'status'
    ];
}
