<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WizardQuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'screen_id',
        'answer_from_category',
        'answer_from_subcategory',
        'answer_from_table',
        'answer_value_from_table',
        'answer_value',
        'status',
        'agent_id',
        'staff_id',
    ];
}
