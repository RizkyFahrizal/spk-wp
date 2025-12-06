<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // <--- Tambahkan ini

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Matikan pengecekan Foreign Key
        Schema::disableForeignKeyConstraints();

        // 2. Kosongkan tabel
        DB::table('kriterias')->truncate();

        // 3. Nyalakan lagi pengecekan Foreign Key
        Schema::enableForeignKeyConstraints();

        $data = [
            ['kode' => 'K1', 'nama' => 'Produktivitas',   'jenis' => 'benefit', 'bobot_w' => 5, 'bobot' => 0],
            ['kode' => 'K2', 'nama' => 'Sikap Kerja',     'jenis' => 'benefit', 'bobot_w' => 4, 'bobot' => 0],
            ['kode' => 'K3', 'nama' => 'Kedisiplinan',    'jenis' => 'benefit', 'bobot_w' => 5, 'bobot' => 0],
            ['kode' => 'K4', 'nama' => 'Absensi',         'jenis' => 'cost',    'bobot_w' => 3, 'bobot' => 0],
            ['kode' => 'K5', 'nama' => 'Kesalahan Kerja', 'jenis' => 'cost',    'bobot_w' => 5, 'bobot' => 0],
        ];

        DB::table('kriterias')->insert($data);
    }
}