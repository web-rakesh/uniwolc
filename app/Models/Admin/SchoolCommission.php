<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'applicable',
        'payment_type',
        'min',
        'max',
        'tax_type_percentage',
        'variable_factor',
        'installment_pay_out',
    ];

    public function school()
    {
        return $this->belongsTo('App\Models\University\ProfileDetail', 'school_id');
    }
}
