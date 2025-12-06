<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\RiwayatDetail;
use App\Models\Karyawan;
use App\Models\Kriteria;

class RiwayatController extends Controller
{
    // 1. TAMPILKAN DAFTAR RIWAYAT
    public function index()
    {
        $riwayats = Riwayat::latest()->paginate(10);
        return view('riwayat.index', compact('riwayats'));
    }

    // 2. TAMPILKAN DETAIL HASIL (MIRIP HASIL HITUNG)
    public function show($id)
    {
        $riwayat = Riwayat::with('details')->findOrFail($id);
        return view('riwayat.show', compact('riwayat'));
    }

    // 3. PROSES SIMPAN (COPY LOGIKA HITUNG WP DISINI)
    public function store(Request $request)
    {
        // Ambil ID karyawan dari form "Simpan"
        $ids = explode(',', $request->karyawan_ids_string); 
        
        // --- MULAI LOGIKA HITUNG (Sama persis dengan HitungController) ---
        $kriterias = Kriteria::all();
        $karyawans = Karyawan::whereIn('id', $ids)->get();
        
        $vektor_S = [];
        $total_S = 0;
        $vektor_V = [];

        foreach ($karyawans as $k) {
            $nilai_S = 1;
            foreach ($kriterias as $krit) {
                $kolom = strtolower($krit->kode);
                $nilai_asli = $k->$kolom;
                $pangkat = ($krit->jenis == 'cost') ? -($krit->bobot) : $krit->bobot;
                
                if ($nilai_asli > 0) {
                    $nilai_S *= pow($nilai_asli, $pangkat);
                } else {
                    $nilai_S = 0;
                }
            }
            $vektor_S[$k->id] = $nilai_S;
            $total_S += $nilai_S;
        }

        // Hitung V dan Ranking
        foreach ($vektor_S as $id_karyawan => $nilai_s) {
            $nilai_v = ($total_S > 0) ? ($nilai_s / $total_S) : 0;
            $nama = $karyawans->firstWhere('id', $id_karyawan)->nama;
            
            $vektor_V[] = [
                'nama' => $nama,
                'nilai' => $nilai_v
            ];
        }

        // Sorting Ranking
        usort($vektor_V, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // --- SELESAI HITUNG, SEKARANG SIMPAN KE DATABASE ---

        // 1. Simpan Header
        $riwayat = Riwayat::create([
            'tanggal_hitung' => now(),
            'keterangan' => 'Perhitungan ' . count($vektor_V) . ' Karyawan',
        ]);

        // 2. Simpan Detail
        foreach ($vektor_V as $index => $data) {
            $rank = $index + 1;
            $status = ($rank <= 3) ? 'Direkomendasikan' : 'Alternatif';

            RiwayatDetail::create([
                'riwayat_id' => $riwayat->id,
                'nama_karyawan' => $data['nama'],
                'nilai_v' => $data['nilai'],
                'ranking' => $rank,
                'status' => $status
            ]);
        }

        return redirect()->route('riwayat.index')->with('success', 'Hasil perhitungan berhasil disimpan ke Riwayat!');
    }
    
    // 4. HAPUS RIWAYAT
    public function destroy($id)
    {
        Riwayat::findOrFail($id)->delete();
        return redirect()->route('riwayat.index')->with('success', 'Riwayat dihapus');
    }
}