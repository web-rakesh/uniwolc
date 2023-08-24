<?php

namespace App\Models;

use App\Models\University\Program;
use App\Models\Student\StudentDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'program_id',
        'payment_method',
        'amount',
        'currency',
        'transaction_id',
        'payment_date',
        'status'
    ];

    protected $casts = [
        'program_id' => 'json',
    ];

    public function student()
    {
        return $this->belongsTo(StudentDetail::class, 'student_id', 'user_id');
    }

    public function program()
    {
        return $this->hasMany(Program::class, 'id', 'program_id');
    }

    public function getProgram()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
}
