<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $appends = ["course_image_url"];

    public function getCourseImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('course-image');
    }

    protected $fillable = [
        'title',
        'description',
    ];
}
