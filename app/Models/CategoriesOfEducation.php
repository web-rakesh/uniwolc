<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesOfEducation extends Model
{
    use HasFactory;

    protected $table = 'categories_of_educations';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];

    public function educationLevels()
    {
        return $this->hasMany(EducationLevel::class, 'category_id', 'id');
    }
}
