<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secondarySubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'secondary_category_id',
        'name'
    ];
}
