<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPrePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'label',
        'description',
        'file',
        'status',
    ];

}
