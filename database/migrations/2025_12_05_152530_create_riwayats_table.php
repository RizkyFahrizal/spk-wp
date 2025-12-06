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
    Schema::create('riwayats', function (Blueprint $table) {
        $table->id();
        $table->timestamp('tanggal_hitung'); // Kapan dihitung
        $table->string('keterangan')->nullable(); // Contoh: "Seleksi Periode Januari"
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
        Schema::dropIfExists('riwayats');
    }
};
