<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_one',
        'phone_two',
        'whatsapp',
        'address_one',
        'address_two',
        'country_id',
        'state_id',
        'city',
        'pincode',
        'processing_fees',
        'preference',
        'terms_and_condition',
        'privacy_policy'
    ];
}
