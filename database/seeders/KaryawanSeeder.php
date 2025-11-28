<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use App\Models\Nilai;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

class KaryawanSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Bersihkan data lama
        Schema::disableForeignKeyConstraints();
        Nilai::truncate();
        Karyawan::truncate();
        Schema::enableForeignKeyConstraints();

        // 2. Siapkan Faker (Generator Data Palsu) Bahasa Indonesia
        $faker = Faker::create('id_ID');

        // 3. Looping sebanyak 45 kali
        for ($i = 1; $i <= 45; $i++) {
            
            // Buat Data Karyawan
            $karyawan = Karyawan::create([
                'nama' => $faker->name, // Nama acak (Cth: Budi, Siti, Hartono)
                'jabatan' => $faker->jobTitle // Jabatan acak
            ]);

            // Buat Nilai untuk 5 Kriteria (C1 - C5)
            // Kita bedakan range nilainya agar terlihat realistis
            
            // C1: Produktifitas (Benefit) -> Range 60 - 100
            Nilai::create(['karyawan_id' => $karyawan->id, 'kriteria_id' => 1, 'nilai' => rand(60, 100)]);
            
            // C2: Keterampilan (Benefit) -> Range 50 - 95
            Nilai::create(['karyawan_id' => $karyawan->id, 'kriteria_id' => 2, 'nilai' => rand(50, 95)]);
            
            // C3: Akhlak (Benefit) -> Range 70 - 100
            Nilai::create(['karyawan_id' => $karyawan->id, 'kriteria_id' => 3, 'nilai' => rand(70, 100)]);
            
            // C4: Absensi (Cost) -> Range 0 - 10 (Semakin kecil semakin bagus)
            Nilai::create(['karyawan_id' => $karyawan->id, 'kriteria_id' => 4, 'nilai' => rand(0, 10)]);
            
            // C5: Kesalahan Kerja (Cost) -> Range 0 - 5 (Jarang salah)
            Nilai::create(['karyawan_id' => $karyawan->id, 'kriteria_id' => 5, 'nilai' => rand(0, 5)]);
        }
    }
}