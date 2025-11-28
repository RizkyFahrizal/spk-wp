<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        // Load data karyawan beserta nilainya agar efisien
        $karyawans = Karyawan::with('nilai')->paginate(10); 
        $kriterias = Kriteria::all();
        return view('karyawan.index', compact('karyawans', 'kriterias'));
    }

    public function create()
    {
        // Kirim data kriteria ke view untuk jadi input form dinamis
        $kriterias = Kriteria::all();
        return view('karyawan.create', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nilai' => 'required|array', // Validasi input array nilai
        ]);

        // 1. Simpan Karyawan
        $karyawan = Karyawan::create($request->only('nama', 'jabatan'));

        // 2. Simpan Nilai-nilainya
        foreach ($request->nilai as $kriteria_id => $nilai_input) {
            Nilai::create([
                'karyawan_id' => $karyawan->id,
                'kriteria_id' => $kriteria_id,
                'nilai' => $nilai_input
            ]);
        }

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function edit(Karyawan $karyawan)
    {
        $kriterias = Kriteria::all();
        // Ambil nilai lama dan ubah formatnya biar mudah diakses di view
        // Format: [id_kriteria => nilai]
        $nilaiLama = $karyawan->nilai->pluck('nilai', 'kriteria_id')->toArray();
        
        return view('karyawan.edit', compact('karyawan', 'kriterias', 'nilaiLama'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        // 1. Update Data Diri
        $karyawan->update($request->only('nama', 'jabatan'));

        // 2. Update Nilai (Looping input)
        foreach ($request->nilai as $kriteria_id => $nilai_baru) {
            // Update atau Create jika belum ada (upsert)
            Nilai::updateOrCreate(
                ['karyawan_id' => $karyawan->id, 'kriteria_id' => $kriteria_id],
                ['nilai' => $nilai_baru]
            );
        }

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diupdate');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete(); // Otomatis hapus nilai di tabel relasi (karena cascade)
        return redirect()->route('karyawan.index')->with('success', 'Karyawan dihapus');
    }
}