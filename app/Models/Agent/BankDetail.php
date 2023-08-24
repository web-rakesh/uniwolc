<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'account_holder_name',
        'bank_name',
        'account_number',
        'ifsc_code',
        'swift_code',
        'note'
    ];
}
