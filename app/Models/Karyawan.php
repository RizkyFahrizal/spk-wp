<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jabatan'];

    // Relasi: Karyawan punya banyak nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}