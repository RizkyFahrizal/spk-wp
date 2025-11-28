@extends('layouts.main')
@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Edit Kriteria: {{ $kriterium->kode }}</h2>
        <form action="{{ route('kriteria.update', $kriterium->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Kriteria</label>
                <input type="text" name="nama" value="{{ $kriterium->nama }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Jenis</label>
                <select name="jenis" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    <option value="benefit" {{ $kriterium->jenis == 'benefit' ? 'selected' : '' }}>Benefit</option>
                    <option value="cost" {{ $kriterium->jenis == 'cost' ? 'selected' : '' }}>Cost</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Bobot</label>
                <input type="number" step="0.01" name="bobot" value="{{ $kriterium->bobot }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Kriteria</button>
        </form>
    </div>
@endsection