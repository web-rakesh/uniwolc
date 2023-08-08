<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    use HasFactory;

    protected $table = 'level_of_educations';

    protected $fillable = [
        'category_id',
        'level_name',
    ];

    public function categoriesOfEducation()
    {
        return $this->belongsTo(CategoriesOfEducation::class, 'category_id');
    }
}
