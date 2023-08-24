<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Testimonial extends Model  implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'label',
        'title',
        'slug',
        'category',
        'content',
        'sub_title',
        'status',
    ];

    protected $appends = ["testimonial_image_url"];

    public function getTestimonialImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('testimonial_image');
    }
}
