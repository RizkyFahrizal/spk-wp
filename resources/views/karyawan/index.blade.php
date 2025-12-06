@extends('layouts.main')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Master Data Karyawan</h1>
        <a href="{{ route('karyawan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition">
            + Tambah Karyawan
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr class="uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama Karyawan</th>
                        <th class="py-3 px-6 text-left">Jabatan</th>
                        @foreach($kriterias as $k)
                            <th class="py-3 px-2 text-center" title="{{ $k->nama }}">{{ $k->kode }}</th>
                        @endforeach
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($karyawans as $karyawan )
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left font-medium text-gray-900">{{ $karyawans->firstItem() + $loop->index }}</td>
                        <td class="py-3 px-6 text-left font-medium text-gray-900">{{ $karyawan->nama }}</td>                        
                        <td class="py-3 px-6 text-left font-medium text-gray-900">{{ $karyawan->jabatan }}</td>                     
                        <td class="py-3 px-2 text-center">{{ $karyawan->k1 }}</td>
                        <td class="py-3 px-2 text-center">{{ $karyawan->k2 }}</td>
                        <td class="py-3 px-2 text-center">{{ $karyawan->k3 }}</td>
                        <td class="py-3 px-2 text-center">{{ $karyawan->k4 }}</td>
                        <td class="py-3 px-2 text-center">{{ $karyawan->k5 }}</td>

                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center gap-2">
                                <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-4 transform hover:text-red-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4">
            {{ $karyawans->links() }}
        </div>
    </div>
@endsection