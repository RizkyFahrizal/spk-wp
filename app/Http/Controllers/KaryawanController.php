<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // Menampilkan daftar karyawan
    public function index()
    {
        // Ambil data karyawan, urutkan terbaru
        $karyawans = Karyawan::latest()->paginate(10);
        
        // Ambil data kriteria buat header tabel (opsional, biar labelnya dinamis)
        $kriterias = Kriteria::all(); 
        
        return view('karyawan.index', compact('karyawans', 'kriterias'));
    }

    // Form Tambah
    public function create()
    {
        // Kita butuh data kriteria untuk label input form (Produktivitas, Sikap, dll)
        $kriterias = Kriteria::all();
        return view('karyawan.create', compact('kriterias'));
    }

    // Proses Simpan
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'k1' => 'required|numeric',
            'k2' => 'required|numeric',
            'k3' => 'required|numeric',
            'k4' => 'required|numeric',
            'k5' => 'required|numeric',
        ]);

        // Simpan semua data request langsung ke tabel karyawans
        // (Pastikan $fillable di Model Karyawan sudah lengkap!)
        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan Berhasil Disimpan');
    }

    // Form Edit
    public function edit(Karyawan $karyawan)
    {
        $kriterias = Kriteria::all();
        return view('karyawan.edit', compact('karyawan', 'kriterias'));
    }

    // Proses Update
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required',
            'k1' => 'required|numeric',
            'k2' => 'required|numeric',
            'k3' => 'required|numeric',
            'k4' => 'required|numeric',
            'k5' => 'required|numeric',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan Berhasil Diupdate');
    }

    // Hapus
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan Dihapus');
    }
}