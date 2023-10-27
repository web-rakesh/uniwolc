<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPreSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'label',
        'description',
        'file',
        'program_submission_model_id',
        'status',
    ];
}
