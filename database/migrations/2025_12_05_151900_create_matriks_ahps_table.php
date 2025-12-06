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
    Schema::create('matriks_ahps', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('kriteria_id_baris');
        $table->unsignedBigInteger('kriteria_id_kolom');
        $table->float('nilai'); // Menyimpan nilai perbandingan (misal: 3, 0.333)
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
        Schema::dropIfExists('matriks_ahps');
    }
};
