<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPreModelQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'pre_model_question_id',
        'label',
        'type',
        'required',
        'placeholder',
        'options',
    ];

    public function modal_label(){
        return $this->belongsTo(PreModelQuestion::class, 'pre_model_question_id');
    }
}
