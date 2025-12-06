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
    public function up()
    {
        Schema::create('riwayat_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_id')->constrained('riwayats')->onDelete('cascade');
            $table->string('nama_karyawan'); // Kita simpan namanya (antisipasi jika karyawan dihapus master)
            $table->float('nilai_v', 10, 4);
            $table->integer('ranking');
            $table->string('status'); // Direkomendasikan / Alternatif
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
        Schema::dropIfExists('riwayat_details');
    }
};
