<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'english_test_type',
        'total_score',
        'reading_score',
        'writing_score',
        'listening_score',
        'speaking_score',
        'exam_date',
        'is_gmat',
        'is_gre',
        'agent_id',
        'staff_id',
        'status'
    ];
}
