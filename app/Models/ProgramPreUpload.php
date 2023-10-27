<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramPreUpload extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'program_id',
        'apply_program_id',
        'program_pre_id',
        'student_id',
        'type',
        'status',
    ];

    protected $appends = ["program_pre_document_url"];

    public function getProgramPreDocumentUrlAttribute()
    {
        return $this->getFirstMediaUrl('program-pre-document');
    }
}
