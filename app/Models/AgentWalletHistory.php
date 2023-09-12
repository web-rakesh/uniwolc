<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentWalletHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'transaction_id',
        'transaction_amount',
        'transaction_currency',
        'transaction_status',
        'transaction_date',
        'transaction_remark',
        'transaction_reject_reason',
        'rejected_at',
        'transaction_note',
    ];

    public function agent()
    {
        return $this->belongsTo(AgentProfile::class, 'agent_id', 'user_id');
    }
}
