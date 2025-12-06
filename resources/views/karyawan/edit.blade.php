@extends('layouts.main')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Data Karyawan</h2>
    
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="bg-gray-50 p-4 rounded mb-6 border border-gray-200">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama', $karyawan->nama) }}" class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500" required>
            
            <label class="block text-gray-700 text-sm font-bold mt-3 mb-2">Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $karyawan->jabatan) }}" class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500">
        </div>

        <h3 class="text-lg font-semibold mb-4 text-gray-700 border-b pb-2">Edit Penilaian</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($kriterias as $k)
                @php
                    // Ambil nama kolom (misal: 'k1')
                    $kolom = strtolower($k->kode);
                @endphp
                <div>
                    <label class="block text-gray-600 text-sm font-bold mb-1">
                        {{ $k->nama }} ({{ $k->kode }})
                    </label>
                    <input type="number" step="0.01" 
                           name="{{ $kolom }}" 
                           value="{{ old($kolom, $karyawan->$kolom) }}" 
                           class="w-full p-2 border border-blue-200 rounded focus:ring-blue-500" 
                           required>
                </div>
            @endforeach
        </div>

        <div class="mt-8 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700 shadow transition">Update Perubahan</button>
            <a href="{{ route('karyawan.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded font-bold hover:bg-gray-400 transition">Batal</a>
        </div>
    </form>
</div>
@endsection