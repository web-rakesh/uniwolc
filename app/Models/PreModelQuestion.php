<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreModelQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
    ];
}
