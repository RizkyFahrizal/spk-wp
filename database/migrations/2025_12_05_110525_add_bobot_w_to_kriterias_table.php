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
    Schema::table('kriterias', function (Blueprint $table) {
        // Menambahkan kolom bobot mentahan (w) setelah kolom jenis
        $table->float('bobot_w', 10, 4)->nullable()->after('jenis'); 
        
        // Memastikan kolom bobot yang lama punya presisi tinggi (opsional)
        // $table->float('bobot', 10, 4)->change();
    });
}

public function down()
{
    Schema::table('kriterias', function (Blueprint $table) {
        $table->dropColumn('bobot_w');
    });
}
};
