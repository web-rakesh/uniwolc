<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramIntake extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'intake_status',
        'deadline',
        'open_date',
        'intake_date',
    ];
}
