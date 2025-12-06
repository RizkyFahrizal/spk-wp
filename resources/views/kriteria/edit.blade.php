@extends('layouts.main')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Bobot Kriteria</h2>
        <a href="{{ route('kriteria.index') }}" class="text-gray-500 hover:text-gray-700 text-sm">&larr; Kembali</a>
    </div>

    <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-blue-50 p-4 rounded mb-6 border border-blue-100">
            <div class="flex justify-between mb-2">
                <span class="text-sm text-gray-500">Kode</span>
                <span class="font-bold text-gray-800">{{ $kriteria->kode }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-500">Nama Kriteria</span>
                <span class="font-bold text-gray-800">{{ $kriteria->nama }}</span>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-lg font-bold mb-2">
                Bobot W (Mentah/Statis)
            </label>
            <p class="text-xs text-gray-500 mb-2">Nilai ini digunakan sebagai acuan awal (Contoh: 1 - 5).</p>
            
            <input type="number" step="0.01" name="bobot_w" 
                   value="{{ old('bobot_w', $kriteria->bobot_w) }}" 
                   class="w-full p-3 border-2 border-blue-300 rounded focus:ring-blue-500 focus:border-blue-500 text-lg font-bold text-gray-800" 
                   required>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Atribut</label>
            <select name="jenis" class="w-full p-2 border rounded focus:ring-blue-500 focus:border-blue-500 bg-gray-50">
                <option value="benefit" {{ $kriteria->jenis == 'benefit' ? 'selected' : '' }}>BENEFIT (Keuntungan)</option>
                <option value="cost" {{ $kriteria->jenis == 'cost' ? 'selected' : '' }}>COST (Biaya/Kerugian)</option>
            </select>
        </div>

        <div class="flex gap-3 mt-8">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded font-bold hover:bg-blue-700 transition w-full shadow">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection