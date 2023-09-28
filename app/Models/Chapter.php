<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Chapter extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'course_id',
        'title',
        'content',
    ];

    protected $appends = ["chapter_video_url"];

    public function getChapterVideoUrlAttribute()
    {
        return $this->getFirstMediaUrl('course-chapter-video');
    }

    public function getCourse()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
