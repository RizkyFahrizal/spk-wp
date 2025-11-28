<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Kriteria;

class HitungController extends Controller
{
    // Halaman Utama: Tampilkan form pilih karyawan
    public function index()
    {
        $karyawans = Karyawan::all(); // Ambil semua data untuk dipilih
        return view('hitung.index', compact('karyawans'));
    }

    // Proses Perhitungan WP
    public function proses(Request $request)
    {
        // 1. Validasi: Pastikan user memilih minimal 1 karyawan
        $request->validate([
            'karyawan_ids' => 'required|array|min:1'
        ], [
            'karyawan_ids.required' => 'Silakan pilih karyawan terlebih dahulu!'
        ]);

        // 2. Ambil data Kriteria & Karyawan yang dipilih
        $kriterias = Kriteria::all();
        $karyawans = Karyawan::with('nilai') // Load relasi nilai
                    ->whereIn('id', $request->karyawan_ids)
                    ->get();

        if ($karyawans->isEmpty()) {
            return back()->with('error', 'Data karyawan tidak ditemukan.');
        }

        // --- Variabel Penampung Hasil ---
        $matriks_awal = [];  // Tabel 1
        $matriks_pangkat = []; // Tabel 2 (Nilai ^ Bobot)
        $vektor_S = [];      // Hasil kali per baris
        $vektor_V = [];      // Tabel 3 (Ranking)
        $total_S = 0;        // Penyebut rumus V

        // --- LOGIKA UTAMA WP ---
        
        foreach ($karyawans as $k) {
            $nilai_S_karyawan = 1; // Inisialisasi perkalian (identitas perkalian = 1)
            $row_pangkat = []; // Baris untuk tabel 2
            
            // Map nilai karyawan biar mudah dipanggil berdasarkan ID Kriteria
            // Contoh: [1 => 80, 2 => 85] (ID Kriteria => Nilai)
            $nilai_map = $k->nilai->pluck('nilai', 'kriteria_id')->toArray();

            foreach ($kriterias as $krit) {
                // Ambil nilai mentah (Default 0 jika belum diinput)
                $nilai_asli = $nilai_map[$krit->id] ?? 0;
                
                // Simpan ke Tabel 1 (Matriks Awal)
                $matriks_awal[$k->id][$krit->id] = $nilai_asli;

                // Tentukan Pangkat (Positif jika Benefit, Negatif jika Cost)
                $pangkat = ($krit->jenis == 'cost') ? -($krit->bobot) : $krit->bobot;

                // Hitung Nilai ^ Pangkat
                // Handle nilai 0 agar tidak error (0 dipangkat negatif = infinite)
                if ($nilai_asli == 0) {
                    $hasil_pangkat = 0; // Atau beri nilai pinalti kecil misal 0.001
                } else {
                    $hasil_pangkat = pow($nilai_asli, $pangkat);
                }

                // Simpan ke Tabel 2
                $row_pangkat[$krit->id] = number_format($hasil_pangkat, 4);

                // Update Vektor S (Perkalian Terus Menerus)
                // Jika ada satu saja nilai 0, maka S otomatis 0
                if ($hasil_pangkat > 0) {
                    $nilai_S_karyawan *= $hasil_pangkat;
                } else {
                    $nilai_S_karyawan = 0;
                }
            }

            // Simpan Vektor S per Karyawan
            $vektor_S[$k->id] = $nilai_S_karyawan;
            $matriks_pangkat[$k->id] = $row_pangkat; // Data Tabel 2 lengkap
            
            // Tambahkan ke Total S (Sigma S)
            $total_S += $nilai_S_karyawan;
        }

        // --- TAHAP AKHIR: MENGHITUNG VEKTOR V (PREFERENSI) ---
        
        foreach ($vektor_S as $id_karyawan => $nilai_s) {
            // Rumus: V = S / Total_S
            $nilai_v = ($total_S > 0) ? ($nilai_s / $total_S) : 0;
            
            // Cari nama karyawan berdasarkan ID
            $nama_karyawan = $karyawans->firstWhere('id', $id_karyawan)->nama;

            // Simpan ke Tabel 3
            $vektor_V[] = [
                'id' => $id_karyawan,
                'nama' => $nama_karyawan,
                'nilai' => $nilai_v
            ];
        }

        // Sorting Ranking (Terbesar ke Terkecil)
        usort($vektor_V, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // Kirim semua data ke View
        return view('hitung.index', [
            'karyawans' => Karyawan::all(), // Untuk form pilih lagi
            'kriterias' => $kriterias,
            'hasil' => true, // Trigger untuk menampilkan tabel
            'tabel1' => $matriks_awal,
            'tabel2' => $matriks_pangkat,
            'vektor_S' => $vektor_S,
            'tabel3' => $vektor_V
        ]);
    }
}