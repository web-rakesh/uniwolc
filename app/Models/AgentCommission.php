<?php

namespace App\Models;

use App\Models\University\Program;
use App\Models\Student\StudentDetail;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agent\AgentGeneralDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgentCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'apply_program_id',
        'program_id',
        'student_id',
        'country_id',
        'program_fees',
        'commission',
        'amount',
        'currency_id',
        'status',
        'payment_status',
        'payment_date'
    ];


    public function agent()
    {
        return $this->belongsTo(AgentGeneralDetail::class, 'agent_id', 'agent_id');
    }

    public function Program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(StudentDetail::class, 'student_id', 'user_id');
    }
}
