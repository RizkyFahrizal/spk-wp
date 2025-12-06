<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan')->nullable();
            
            // UBAH NAMA KOLOM JADI K1 - K5
            $table->float('k1')->default(0); // Produktivitas
            $table->float('k2')->default(0); // Sikap Kerja / Keterampilan
            $table->float('k3')->default(0); // Kedisiplinan / Akhlak
            $table->float('k4')->default(0); // Absensi
            $table->float('k5')->default(0); // Kesalahan Kerja

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};