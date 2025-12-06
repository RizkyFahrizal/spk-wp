<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\MatriksAhp; // Jangan lupa panggil model baru ini
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    // --- 1. HALAMAN UTAMA (OTOMATIS HITUNG JIKA ADA DATA) ---
    public function index()
    {
        $kriterias = Kriteria::orderBy('kode')->get();
        
        // Cek apakah sudah pernah ada data matriks yang disimpan?
        $cek_data = MatriksAhp::first();

        if ($cek_data) {
            // JIKA ADA DATA DI DATABASE, KITA HITUNG ULANG AGAR TAMPIL
            $ids = $kriterias->pluck('id')->toArray();
            $n = count($ids);

            $matriks_awal = [];
            $jumlah_kolom = [];
            foreach ($ids as $id) $jumlah_kolom[$id] = 0;

            // Ambil nilai dari Database MatriksAhp
            foreach ($ids as $row_id) {
                foreach ($ids as $col_id) {
                    // Ambil nilai dari tabel matriks_ahps
                    $record = MatriksAhp::where('kriteria_id_baris', $row_id)
                                        ->where('kriteria_id_kolom', $col_id)
                                        ->first();
                    
                    // Jika tidak ada (misal data baru), default 1
                    $val = $record ? $record->nilai : 1;

                    $matriks_awal[$row_id][$col_id] = $val;
                    $jumlah_kolom[$col_id] += $val;
                }
            }

            // Hitung Normalisasi
            $matriks_norm = [];
            $total_baris_norm = []; // Total bawah normalisasi (pasti 1)
            $bobot_akhir = [];

            foreach ($ids as $id) $total_baris_norm[$id] = 0;

            foreach ($ids as $row_id) {
                $jumlah_baris_temp = 0;
                foreach ($ids as $col_id) {
                    $val_norm = $matriks_awal[$row_id][$col_id] / $jumlah_kolom[$col_id];
                    $matriks_norm[$row_id][$col_id] = $val_norm;
                    
                    $jumlah_baris_temp += $val_norm;
                    $total_baris_norm[$col_id] += $val_norm;
                }
                $bobot_akhir[$row_id] = $jumlah_baris_temp / $n;
            }

            // Variabel penanda bahwa perhitungan ada
            $hasil_ahp = true;

            return view('kriteria.index', compact(
                'kriterias', 'matriks_awal', 'matriks_norm', 
                'jumlah_kolom', 'total_baris_norm', 'hasil_ahp'
            ));
        }

        // JIKA BELUM ADA DATA (TAMPILAN KOSONG)
        return view('kriteria.index', compact('kriterias'));
    }

    // --- 2. PROSES SIMPAN INPUT USER KE DATABASE ---
    public function prosesAhp(Request $request)
    {
        $matrix_input = $request->input('matrix');
        $kriterias = Kriteria::orderBy('kode')->get();
        $ids = $kriterias->pluck('id')->toArray();
        $n = count($ids); // Hitung jumlah kriteria (misal 5)

        // 1. Simpan Matriks ke Database (Supaya PERMANEN)
        // Kita loop input dari user, lalu update/create di tabel matriks_ahps
        foreach ($ids as $row_id) {
            foreach ($ids as $col_id) {
                $val = isset($matrix_input[$row_id][$col_id]) ? (float) $matrix_input[$row_id][$col_id] : 1;
                
                MatriksAhp::updateOrCreate(
                    [
                        'kriteria_id_baris' => $row_id,
                        'kriteria_id_kolom' => $col_id
                    ],
                    [
                        'nilai' => $val
                    ]
                );
            }
        }

        // 2. Lakukan Perhitungan Bobot Akhir (Untuk disimpan ke tabel Kriteria)
        // (Logika hitung dicopy lagi disini untuk update bobot real-time)
        $jumlah_kolom = [];
        foreach ($ids as $id) $jumlah_kolom[$id] = 0;
        
        // Hitung total kolom dulu
        foreach ($ids as $row_id) {
            foreach ($ids as $col_id) {
                $val = isset($matrix_input[$row_id][$col_id]) ? $matrix_input[$row_id][$col_id] : 1;
                $jumlah_kolom[$col_id] += $val;
            }
        }

        // Hitung bobot prioritas & update tabel kriteria
        foreach ($ids as $row_id) {
            $jumlah_baris_temp = 0;
            foreach ($ids as $col_id) {
                $val = isset($matrix_input[$row_id][$col_id]) ? $matrix_input[$row_id][$col_id] : 1;
                $val_norm = $val / $jumlah_kolom[$col_id];
                $jumlah_baris_temp += $val_norm;
            }
            $bobot_fix = $jumlah_baris_temp / $n;

            // Simpan Bobot Akhir ke Master Kriteria
            Kriteria::where('id', $row_id)->update(['bobot' => $bobot_fix]);
        }

        // 3. Redirect Balik ke Index
        // Karena datanya sudah disimpan di DB, pas redirect ke index, 
        // fungsi index() akan otomatis membaca data tsb dan menampilkannya!
        return redirect()->route('kriteria.index')->with('success', 'Matriks disimpan & dihitung!');
    }

    // --- 3. FUNGSI EDIT & UPDATE (TETAP SAMA) ---
    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bobot_w' => 'required|numeric',
            'jenis'   => 'required|in:benefit,cost',
        ]);

        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update([
            'bobot_w' => $request->bobot_w,
            'jenis'   => $request->jenis,
        ]);

        return redirect()->route('kriteria.index')->with('success', 'Bobot W berhasil diperbarui!');
    }
}