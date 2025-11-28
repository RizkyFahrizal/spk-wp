<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = ['karyawan_id', 'kriteria_id', 'nilai'];

    // Relasi: Satu nilai "milik" satu kriteria
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
    
    // Relasi: Satu nilai "milik" satu karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}