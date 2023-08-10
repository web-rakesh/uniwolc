<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'apply_program_id',
        'program_id',
        'university_id',
        'country_id',
        'program_fees',
        'commission',
        'amount',
        'currency_id',
        'status',
        'payment_status'
    ];
}
