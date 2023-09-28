<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secondaryCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function subCategory()
    {
        return $this->belongsTo(secondarySubCategory::class, 'id','secondary_category_id');
    }
}
