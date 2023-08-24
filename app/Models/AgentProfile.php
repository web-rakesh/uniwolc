<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'agent_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'is_verify'
    ];

    public function getCountry(){
        return $this->hasOne(Country::class, 'id', 'country');
    }

    public function getState(){
        return $this->hasOne(State::class, 'id', 'state');
    }
}
