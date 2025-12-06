<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Kriteria;

class HitungController extends Controller
{
    public function index()
    {
        // Tampilkan halaman awal dengan daftar semua karyawan untuk dipilih
        $karyawans = Karyawan::all();
        return view('hitung.index', compact('karyawans'));
    }

    public function proses(Request $request)
    {
        // 1. Validasi: User harus memilih minimal 1 karyawan
        $request->validate([
            'karyawan_ids' => 'required|array|min:1'
        ], [
            'karyawan_ids.required' => 'Silakan centang minimal satu karyawan!'
        ]);

        // 2. Ambil Data
        // Ambil data bobot terbaru dari tabel Kriteria (K1-K5)
        $kriterias = Kriteria::orderBy('kode')->get();
        
        // Ambil data karyawan yang dipilih user
        $karyawans = Karyawan::whereIn('id', $request->karyawan_ids)->get();

        // Variabel Penampung Hasil
        $tabel1_matriks_awal = [];
        $tabel2_hasil_pangkat = [];
        $vektor_S = [];
        $vektor_V = [];
        $total_S = 0;

        // --- MULAI PERHITUNGAN METODE WP ---

        foreach ($karyawans as $k) {
            $nilai_S_karyawan = 1; // Nilai awal perkalian = 1
            $baris_pangkat = [];   // Untuk tampilan Tabel 2

            foreach ($kriterias as $krit) {
                // A. AMBIL NILAI KARYAWAN (k1, k2, dst)
                // Karena di DB kolomnya 'k1' (kecil), tapi kode kriteria 'K1' (besar)
                // Kita pakai strtolower() biar cocok.
                $nama_kolom = strtolower($krit->kode); // Jadi 'k1', 'k2'...
                $nilai_asli = $k->$nama_kolom; 

                // Simpan ke Tabel 1 (Matriks Awal)
                $tabel1_matriks_awal[$k->id][$krit->id] = $nilai_asli;

                // B. TENTUKAN PANGKAT (BOBOT)
                // Jika Benefit: Pangkat Positif (+w)
                // Jika Cost: Pangkat Negatif (-w)
                $pangkat = ($krit->jenis == 'cost') ? -($krit->bobot) : $krit->bobot;

                // C. HITUNG PANGKAT (Rumus WP: Nilai ^ Bobot)
                // Cegah error jika nilai 0 dipangkatkan negatif (Infinite)
                if ($nilai_asli == 0) {
                    $hasil_pangkat = 0; 
                } else {
                    $hasil_pangkat = pow($nilai_asli, $pangkat);
                }

                // Simpan ke Tabel 2 (Hanya untuk display)
                $baris_pangkat[$krit->id] = $hasil_pangkat;

                // D. KALIKAN TERUS UNTUK DAPAT NILAI S
                // Jika ada satu saja nilai 0, maka S otomatis 0
                if ($hasil_pangkat > 0) {
                    $nilai_S_karyawan *= $hasil_pangkat;
                } else {
                    $nilai_S_karyawan = 0;
                }
            }

            // Simpan Vektor S si Karyawan ini
            $vektor_S[$k->id] = $nilai_S_karyawan;
            $tabel2_hasil_pangkat[$k->id] = $baris_pangkat;
            
            // Tambahkan ke Total S (Sigma S) untuk pembagi nanti
            $total_S += $nilai_S_karyawan;
        }

        // --- TAHAP AKHIR: MENGHITUNG VEKTOR V (Ranking) ---
        // Rumus: V = S / Total_S

        foreach ($vektor_S as $id_karyawan => $nilai_s) {
            $nilai_v = ($total_S > 0) ? ($nilai_s / $total_S) : 0;
            
            // Ambil nama karyawan
            $nama = $karyawans->firstWhere('id', $id_karyawan)->nama;

            $vektor_V[] = [
                'id' => $id_karyawan,
                'nama' => $nama,
                'nilai' => $nilai_v
            ];
        }

        // Sorting dari Nilai V Terbesar ke Terkecil (Juara 1 diatas)
        usort($vektor_V, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // Kirim semua data ke View
        return view('hitung.index', [
            'karyawans' => Karyawan::all(), // Untuk form pilih lagi
            'kriterias' => $kriterias,
            'hasil' => true, // Penanda agar tabel muncul
            'tabel1' => $tabel1_matriks_awal,
            'tabel2' => $tabel2_hasil_pangkat,
            'vektor_S' => $vektor_S,
            'tabel3' => $vektor_V
        ]);
    }
}