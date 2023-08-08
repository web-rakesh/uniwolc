<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageSubAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'menu',
        'permission',
    ];

}
