@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Riwayat Perhitungan</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">No</th>
                    <th class="py-3 px-6 text-left">Tanggal Hitung</th>
                    <th class="py-3 px-6 text-left">Keterangan</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($riwayats as $r)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                    <td class="py-3 px-6 font-bold">
                        {{ \Carbon\Carbon::parse($r->tanggal_hitung)->format('d M Y, H:i') }} WIB
                    </td>
                    <td class="py-3 px-6">{{ $r->keterangan }}</td>
                    <td class="py-3 px-6 text-center flex justify-center gap-2">
                        <a href="{{ route('riwayat.show', $r->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600">
                            Lihat Detail
                        </a>
                        <form action="{{ route('riwayat.destroy', $r->id) }}" method="POST" onsubmit="return confirm('Hapus riwayat ini?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection