<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel karyawan (hapus nilai jika karyawan dihapus)
            $table->foreignId('karyawan_id')->constrained()->onDelete('cascade');
            // Relasi ke tabel kriteria (hapus nilai jika kriteria dihapus)
            $table->foreignId('kriteria_id')->constrained()->onDelete('cascade');
            $table->float('nilai'); // Nilai mentah (misal: 80, 5, dll)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
};
