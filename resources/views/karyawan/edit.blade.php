@extends('layouts.main')
@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Tambah Karyawan Baru</h2>
    <form action="{{ route('karyawan.store') }}" method="PUT">
        @csrf

        <div class="mb-6 border-b pb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama', $karyawan->nama) }}" class="w-full p-2 border rounded" required>
            <label class="block text-gray-700 text-sm font-bold mt-3 mb-2">Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $karyawan->jabatan) }}" class="w-full p-2 border rounded">
        </div>

        <h3 class="text-lg font-semibold mb-4 text-gray-700">Input Penilaian</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($kriterias as $k)
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-1">
                    {{ $k->nama }} ({{ $k->kode }})
                </label>
                <input type="number" step="0.01" value="{{ $nilaiLama[$k->id] ?? 0 }}" name="nilai[{{ $k->id }}]" class="w-full p-2 border border-blue-200 rounded focus:ring-blue-500" placeholder="0 - 100" required>
            </div>
            @endforeach
        </div>

        <div class="mt-8">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700">Simpan Data</button>
        </div>
    </form>
</div>
@endsection