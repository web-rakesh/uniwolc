<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'course_id',
        'chapter_id',
        'title',
        'content',
    ];
    protected $appends = ["lesson_video_url"];

    public function getLessonVideoUrlAttribute()
    {
        return $this->getFirstMediaUrl('course-lesson-video');
    }

    public function getCourse()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }


    public function getChapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id', 'id');
    }
}
