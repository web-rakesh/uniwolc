<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaPermit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'refused_a_visa',
        'study_permit_or_visa',
        'about_visa_permit',
        'agent_id',
        'staff_id',
        'status'
    ];
}
