<?php

namespace App\Models\Admin\Question;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionSubCategory extends Model
{
    use HasFactory;

    protected $table = 'screen_subcategories';

    protected $fillable = [
        'category_id',
        'name',
        'has_category',
        'parent_screen_id',
        'screen_id',
        'status'
    ];

    public function category(){
        return $this->belongsTo(QuestionCategory::class, 'category_id');
    }

}
