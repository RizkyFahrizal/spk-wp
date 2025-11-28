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
            ['kode' => 'C1', 'nama' => 'Produktifitas',   'jenis' => 'benefit', 'bobot' => 0.25],
            ['kode' => 'C2', 'nama' => 'Keterampilan',    'jenis' => 'benefit', 'bobot' => 0.25],
            ['kode' => 'C3', 'nama' => 'Akhlak',          'jenis' => 'benefit', 'bobot' => 0.20],
            ['kode' => 'C4', 'nama' => 'Absensi',         'jenis' => 'cost',    'bobot' => 0.15],
            ['kode' => 'C5', 'nama' => 'Kesalahan Kerja', 'jenis' => 'cost',    'bobot' => 0.15],
        ];

        DB::table('kriterias')->insert($data);
    }
}