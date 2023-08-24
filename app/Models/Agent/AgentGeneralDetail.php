<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class AgentGeneralDetail extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'agent_id',
        'company_name',
        'company_email',
        'company_website',
        'skype',
        'company_whatsapp',
        'company_phone_one',
        'company_phone_two',
        'company_country',
        'company_address',
        'company_state',
        'company_city',
        'company_postcode'


    ];
}
