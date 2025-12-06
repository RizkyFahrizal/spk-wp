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
        // // 1. Bersihkan data lama
        // Schema::disableForeignKeyConstraints();
        // Nilai::truncate();
        // Karyawan::truncate();
        // Schema::enableForeignKeyConstraints();

        // // 2. Siapkan Faker (Generator Data Palsu) Bahasa Indonesia
        // $faker = Faker::create('id_ID');

        // // 3. Looping sebanyak 45 kali
        // for ($i = 1; $i <= 45; $i++) {
            
        //     // Buat Data Karyawan
        //     $karyawan = Karyawan::create([
        //         'nama' => $faker->name, // Nama acak (Cth: Budi, Siti, Hartono)
        //         'jabatan' => $faker->jobTitle // Jabatan acak
        //     ]);

        //     // Buat Nilai untuk 5 Kriteria (C1 - C5)
        //     // Kita bedakan range nilainya agar terlihat realistis
            
        //     // C1: Produktifitas (Benefit) -> Range 60 - 100
        //     Nilai::create(['karyawan_id' => $karyawan->id, 'kriteria_id' => 1, 'nilai' => rand(60, 100)]);
            
        //     // C2: Keterampilan (Benefit) -> Range 50 - 95
        //     Nilai::create(['karyawan_id' => $karyawan->id, 'kriteria_id' => 2, 'nilai' => rand(50, 95)]);
            
        //     // C3: Akhlak (Benefit) -> Range 70 - 100
        //     Nilai::create(['karyawan_id' => $karyawan->id, 'kriteria_id' => 3, 'nilai' => rand(70, 100)]);
            
        //     // C4: Absensi (Cost) -> Range 0 - 10 (Semakin kecil semakin bagus)
        //     Nilai::create(['karyawan_id' => $karyawan->id, 'kriteria_id' => 4, 'nilai' => rand(0, 10)]);
            
        //     // C5: Kesalahan Kerja (Cost) -> Range 0 - 5 (Jarang salah)
        //     Nilai::create(['karyawan_id' => $karyawan->id, 'kriteria_id' => 5, 'nilai' => rand(0, 5)]);
        // }

    //     foreach ($data_karyawan as $row) {
    //         // 1. Buat Karyawan
    //         $karyawan = Karyawan::create([
    //             'nama' => $row['nama'],
    //             'jabatan' => 'Staff'
    //         ]);

    //         // 2. Masukkan Nilai (Mapping C1-C5 ke ID Kriteria 1-5)
    //         $this->insertNilai($karyawan->id, 1, $row['C1']); // C1
    //         $this->insertNilai($karyawan->id, 2, $row['C2']); // C2
    //         $this->insertNilai($karyawan->id, 3, $row['C3']); // C3
    //         $this->insertNilai($karyawan->id, 4, $row['C4']); // C4
    //         $this->insertNilai($karyawan->id, 5, $row['C5']); // C5
    //     }
    // }

    // private function insertNilai($karyawan_id, $kriteria_id, $nilai) {
    //     Nilai::create([
    //         'karyawan_id' => $karyawan_id,
    //         'kriteria_id' => $kriteria_id,
    //         'nilai' => $nilai
    //     ]);
    // }

    Schema::disableForeignKeyConstraints();
        Karyawan::truncate();
        Schema::enableForeignKeyConstraints();

        $data_karyawan = [
            ['nama' => 'Andi Pratama', 'jabatan'=>'Staff Administrasi', 'k1'=>82, 'k2'=>75, 'k3'=>88, 'k4'=>70, 'k5'=>85],
            ['nama' => 'Budi Santoso', 'jabatan'=>'Marketing Officer', 'k1'=>77, 'k2'=>68, 'k3'=>80, 'k4'=>65, 'k5'=>78],
            ['nama' => 'Citra Maharani', 'jabatan'=>'HR Staff', 'k1'=>90, 'k2'=>82, 'k3'=>85, 'k4'=>78, 'k5'=>89],
            ['nama' => 'Dwi Nugroho', 'jabatan'=>'Operator Produksi', 'k1'=>70, 'k2'=>60, 'k3'=>72, 'k4'=>55, 'k5'=>73],
            ['nama' => 'Eka Wulandari', 'jabatan'=>'Supervisor Produksi', 'k1'=>85, 'k2'=>79, 'k3'=>87, 'k4'=>74, 'k5'=>84],
            ['nama' => 'Fajar Ramadhan', 'jabatan'=>'IT Support', 'k1'=>76, 'k2'=>72, 'k3'=>78, 'k4'=>69, 'k5'=>80],
            ['nama' => 'Galih Saputra', 'jabatan'=>'Quality Control', 'k1'=>88, 'k2'=>83, 'k3'=>90, 'k4'=>82, 'k5'=>91],
            ['nama' => 'Hani Lestari', 'jabatan'=>'Kasir', 'k1'=>81, 'k2'=>74, 'k3'=>83, 'k4'=>71, 'k5'=>82],
            ['nama' => 'Indra Kusuma', 'jabatan'=>'Analis Data', 'k1'=>92, 'k2'=>85, 'k3'=>89, 'k4'=>80, 'k5'=>90],
            ['nama' => 'Joko Prasetyo', 'jabatan'=>'Staff Gudang', 'k1'=>68, 'k2'=>62, 'k3'=>70, 'k4'=>58, 'k5'=>72],
            ['nama' => 'Kartika Dewi', 'jabatan'=>'Customer Service', 'k1'=>79, 'k2'=>73, 'k3'=>82, 'k4'=>67, 'k5'=>81],
            ['nama' => 'Luthfi Hidayat', 'jabatan'=>'Backend Developer', 'k1'=>87, 'k2'=>80, 'k3'=>88, 'k4'=>76, 'k5'=>86],
            ['nama' => 'Maya Sari', 'jabatan'=>'Administrasi Keuangan', 'k1'=>75, 'k2'=>69, 'k3'=>77, 'k4'=>64, 'k5'=>76],
            ['nama' => 'Nanda Putri', 'jabatan'=>'Supervisor HR', 'k1'=>84, 'k2'=>78, 'k3'=>85, 'k4'=>73, 'k5'=>83],
            ['nama' => 'Oka Wirawan', 'jabatan'=>'Petugas Lapangan', 'k1'=>78, 'k2'=>71, 'k3'=>80, 'k4'=>68, 'k5'=>79],
            ['nama' => 'Putri Ayu', 'jabatan'=>'Manager Operasional', 'k1'=>93, 'k2'=>88, 'k3'=>92, 'k4'=>85, 'k5'=>94],
            ['nama' => 'Qori Ananda', 'jabatan'=>'Staff Arsip', 'k1'=>72, 'k2'=>65, 'k3'=>74, 'k4'=>60, 'k5'=>73],
            ['nama' => 'Raka Pradana', 'jabatan'=>'Koordinator Lapangan', 'k1'=>89, 'k2'=>82, 'k3'=>87, 'k4'=>79, 'k5'=>88],
            ['nama' => 'Sinta Melati', 'jabatan'=>'Public Relations', 'k1'=>80, 'k2'=>74, 'k3'=>83, 'k4'=>70, 'k5'=>82],
            ['nama' => 'Taufik Hidayat', 'jabatan'=>'Teknisi Mesin', 'k1'=>74, 'k2'=>68, 'k3'=>76, 'k4'=>63, 'k5'=>75],
            ['nama' => 'Umi Kurnia', 'jabatan'=>'Spesialis Rekrutmen', 'k1'=>86, 'k2'=>79, 'k3'=>88, 'k4'=>77, 'k5'=>87],
            ['nama' => 'Vina Anggraini', 'jabatan'=>'Admin Supplier', 'k1'=>82, 'k2'=>76, 'k3'=>84, 'k4'=>72, 'k5'=>83],
            ['nama' => 'Wahyu Setiawan', 'jabatan'=>'Analis Sistem', 'k1'=>88, 'k2'=>81, 'k3'=>89, 'k4'=>78, 'k5'=>90],
            ['nama' => 'Xena Paramitha', 'jabatan'=>'Admin Penjualan', 'k1'=>73, 'k2'=>67, 'k3'=>75, 'k4'=>62, 'k5'=>74],
            ['nama' => 'Yudi Hartono', 'jabatan'=>'Supervisor Gudang', 'k1'=>83, 'k2'=>77, 'k3'=>85, 'k4'=>73, 'k5'=>84],
            ['nama' => 'Zahra Nuraini', 'jabatan'=>'Data Entry', 'k1'=>91, 'k2'=>84, 'k3'=>90, 'k4'=>81, 'k5'=>92],
            ['nama' => 'Arif Budiman', 'jabatan'=>'Staff Pembelian', 'k1'=>71, 'k2'=>64, 'k3'=>73, 'k4'=>59, 'k5'=>72],
            ['nama' => 'Bella Oktaviani', 'jabatan'=>'Marketing Executive', 'k1'=>85, 'k2'=>79, 'k3'=>86, 'k4'=>75, 'k5'=>86],
            ['nama' => 'Chandra Wijaya', 'jabatan'=>'Staf Produksi', 'k1'=>78, 'k2'=>72, 'k3'=>80, 'k4'=>68, 'k5'=>79],
            ['nama' => 'Dewi Anggun', 'jabatan'=>'Manager HR', 'k1'=>92, 'k2'=>86, 'k3'=>91, 'k4'=>84, 'k5'=>93],
            ['nama' => 'Eko Susanto', 'jabatan'=>'Kurir', 'k1'=>70, 'k2'=>63, 'k3'=>72, 'k4'=>57, 'k5'=>71],
            ['nama' => 'Farah Nabila', 'jabatan'=>'Front Desk Officer', 'k1'=>79, 'k2'=>73, 'k3'=>81, 'k4'=>69, 'k5'=>80],
            ['nama' => 'Gita Permata', 'jabatan'=>'Content Creator', 'k1'=>87, 'k2'=>81, 'k3'=>88, 'k4'=>77, 'k5'=>88],
            ['nama' => 'Hendra Gunawan', 'jabatan'=>'Teknisi Listrik', 'k1'=>74, 'k2'=>68, 'k3'=>75, 'k4'=>63, 'k5'=>74],
            ['nama' => 'Intan Safitri', 'jabatan'=>'Supervisor Keuangan', 'k1'=>90, 'k2'=>83, 'k3'=>89, 'k4'=>80, 'k5'=>91],
            ['nama' => 'Jihan Amelia', 'jabatan'=>'Customer Support', 'k1'=>81, 'k2'=>75, 'k3'=>83, 'k4'=>71, 'k5'=>82],
            ['nama' => 'Kevin Aditya', 'jabatan'=>'Software Engineer', 'k1'=>94, 'k2'=>87, 'k3'=>93, 'k4'=>86, 'k5'=>95],
            ['nama' => 'Laila Khairunnisa', 'jabatan'=>'Staff Keuangan', 'k1'=>76, 'k2'=>70, 'k3'=>78, 'k4'=>65, 'k5'=>77],
            ['nama' => 'Miko Prasetya', 'jabatan'=>'Supervisor Produksi', 'k1'=>85, 'k2'=>79, 'k3'=>86, 'k4'=>74, 'k5'=>85],
            ['nama' => 'Nadia Rahmawati', 'jabatan'=>'Analis Bisnis', 'k1'=>91, 'k2'=>85, 'k3'=>90, 'k4'=>82, 'k5'=>92],
            ['nama' => 'Cristiano Ronaldo', 'jabatan'=>'Brand Ambassador', 'k1'=>88, 'k2'=>98, 'k3'=>100, 'k4'=>70, 'k5'=>95],
            ['nama' => 'Lionel Messi', 'jabatan'=>'Konsultan Strategi', 'k1'=>86, 'k2'=>90, 'k3'=>90, 'k4'=>89, 'k5'=>98],
            ['nama' => 'Bambang Pamungkas', 'jabatan'=>'Pelatih Fisik', 'k1'=>76, 'k2'=>84, 'k3'=>95, 'k4'=>92, 'k5'=>87],
            ['nama' => 'Madun', 'jabatan'=>'Koordinator Tim', 'k1'=>88, 'k2'=>88, 'k3'=>70, 'k4'=>96, 'k5'=>75],
            ['nama' => 'Ronaldowati', 'jabatan'=>'Manajer Proyek', 'k1'=>90, 'k2'=>90, 'k3'=>93, 'k4'=>97, 'k5'=>96],
        ];

        foreach ($data_karyawan as $d) {
            Karyawan::create($d);
        }
    }
}