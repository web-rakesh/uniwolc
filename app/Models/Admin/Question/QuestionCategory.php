<?php

namespace App\Models\Admin\Question;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    use HasFactory;

    protected $table = 'screen_categories';

    protected $fillable = [
        'screen_id',
        'name',
        'has_sub_category',
        'table_name',
        'type',
        'status'
    ];

    public function subCategory()
    {
        return $this->hasMany(QuestionSubCategory::class, 'category_id');
    }
}
