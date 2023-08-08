<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'sub_title',
        'description',
        'content',
        'is_active',
        'meta_tag',
        'meta_description',
    ];


    protected $appends = ["profile_url"];

    public function getProfileUrlAttribute()
    {
        return $this->getFirstMediaUrl('blog_image');
    }
}
