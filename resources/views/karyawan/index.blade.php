@extends('layouts.main')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Data Karyawan</h1>
        <a href="{{ route('karyawan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">+ Tambah Karyawan</a>
    </div>

    <div class="bg-white shadow-md rounded overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">Jabatan</th>
                    @foreach($kriterias as $k)
                        <th class="py-3 px-2 text-center text-xs">{{ $k->kode }}</th>
                    @endforeach
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($karyawans as $karyawan)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left font-bold">{{ $karyawan->nama }}</td>
                    <td class="py-3 px-6 text-left">{{ $karyawan->jabatan }}</td>

                    @foreach($kriterias as $k)
                        <td class="py-3 px-2 text-center">
                            {{-- Ambil nilai berdasarkan ID Kriteria, default 0 jika null --}}
                            {{ $karyawan->nilai->where('kriteria_id', $k->id)->first()->nilai ?? 0 }}
                        </td>
                    @endforeach

                    <td class="py-3 px-6 text-center flex justify-center gap-2">
                        <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600">Edit</a>

                        <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-2 rounded hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">
            {{ $karyawans->links() }}
        </div>
    </div>
@endsection