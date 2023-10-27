<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPreModelQuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'apply_program_id',
        'student_id',
        'pre_model_question_id',
        'pre_submission_qus_id',
        'question',
        'answer',
    ];
}
