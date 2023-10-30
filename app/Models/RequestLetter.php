<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use App\Models\Student\StudentDetail;
use Illuminate\Database\Eloquent\Model;
use App\Models\University\ProfileDetail;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestLetter extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'student_id',
        'student_name',
        'email',
        'subject',
        'message',
        'university_name',
        'university_id'
    ];

    protected $appends = ["request_letter_url"];

    public function getRequestLetterUrlAttribute()
    {
        return $this->getFirstMediaUrl('request-letter');
    }

    public function student(){
         return $this->belongsTo(StudentDetail::class, 'student_id', 'id');
    }

    public function university(){
         return $this->belongsTo(ProfileDetail::class, 'university_id', 'id');
    }
}
