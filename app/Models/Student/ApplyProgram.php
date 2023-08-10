<?php

namespace App\Models\Student;

use App\Models\University\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplyProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'program_id',
        'slug',
        'application_number',
        'program_title',
        'esl_start_date',
        'start_date',
        'fees',
        'status',
        'application_status',
        'backup_program',
        'program_status',
        'remark',
        'reject_program',
        'agent_id',
        'staff_id'
    ];

    public function getProgram()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function uploadedDocument()
    {
        return $this->belongsTo(ApplicantUploadDocument::class, 'program_id', 'apply_program_id');
    }

    public function getStudent()
    {
        return $this->belongsTo(StudentDetail::class, 'user_id', 'user_id');
    }

    public function getAgent()
    {
        return $this->belongsTo(\App\Models\Agent\AgentDetail::class, 'agent_id', 'user_id');
    }

    // Add a method to calculate the average rating percentage
    public function averageCommissionPercentage()
    {
        if ($this->getProgram->count() === 0) {
            return 0; // No reviews, so the percentage is 0.
        }

        $applicationFees = $this->getProgram->sum('application_fee');
        $commissionPercentage =  $this->getProgram->agent_commission;

        // Assuming the rating scale is from 1 to 5, we'll convert it to a percentage.
        return ($applicationFees / $commissionPercentage) * 100;
    }
}
