<?php

namespace App\Models\Admin\Question;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionScreen extends Model
{
    use HasFactory;

    protected $table = 'screens';

    protected $fillable = [
        'label',
        'description',
        'sequence_no',
        'has_subcategory_as_child',
        'status'
    ];

    public function category()
    {
        return $this->hasMany(QuestionCategory::class,  'screen_id');
    }
}
