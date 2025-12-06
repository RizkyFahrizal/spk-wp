<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'jabatan', 
        'k1', 'k2', 'k3', 'k4', 'k5' 
    ];
}