<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'school_name',
        'name',
        'email',
        'phone_code',
        'phone_number',
        'contact_title',
        'is_apply',
        'refer_name',
        'refer_email',
        'comment',
        'agree'
    ];

    public function getCountry()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }
}
