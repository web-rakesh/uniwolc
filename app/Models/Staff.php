<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'country_code',
        'phone_number',
        'address',
        'city',
        'state',
        'country',
        'location',
        'status',
        'agent_id'
    ];

    public function countryGet()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    public function stateGet()
    {
        return $this->belongsTo(State::class, 'state', 'id');
    }
}
