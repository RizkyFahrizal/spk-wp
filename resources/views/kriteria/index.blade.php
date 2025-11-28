@extends('layouts.main')
@section('content')
    <h1 class="text-3xl font-bold mb-6">Data Kriteria</h1>
    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Kode</th>
                    <th class="py-3 px-6 text-left">Nama Kriteria</th>
                    <th class="py-3 px-6 text-center">Jenis</th>
                    <th class="py-3 px-6 text-center">Bobot</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($kriterias as $k)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left font-bold">{{ $k->kode }}</td>
                    <td class="py-3 px-6 text-left">{{ $k->nama }}</td>
                    <td class="py-3 px-6 text-center">
                        <span class="{{ $k->jenis == 'benefit' ? 'bg-green-200 text-green-600' : 'bg-red-200 text-red-600' }} py-1 px-3 rounded-full text-xs">
                            {{ $k->jenis }}
                        </span>
                    </td>
                    <td class="py-3 px-6 text-center">{{ $k->bobot }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('kriteria.edit', $k->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded text-xs hover:bg-yellow-600">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection