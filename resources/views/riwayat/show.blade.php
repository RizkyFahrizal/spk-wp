@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Detail Hasil Perhitungan</h1>
            <p class="text-gray-500">Tanggal: {{ \Carbon\Carbon::parse($riwayat->tanggal_hitung)->format('d F Y, H:i') }}</p>
        </div>
        <a href="{{ route('riwayat.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden border-t-4 border-indigo-500">
        <table class="min-w-full table-auto">
            <thead class="bg-indigo-50">
                <tr>
                    <th class="py-3 px-6 text-center font-bold text-gray-700">Rank</th>
                    <th class="py-3 px-6 text-left font-bold text-gray-700">Nama Karyawan</th>
                    <th class="py-3 px-6 text-center font-bold text-gray-700">Nilai V</th>
                    <th class="py-3 px-6 text-center font-bold text-gray-700">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @foreach($riwayat->details as $d)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-6 text-center font-bold text-indigo-600 text-lg">
                        #{{ $d->ranking }}
                    </td>
                    <td class="py-3 px-6 font-medium text-gray-900">{{ $d->nama_karyawan }}</td>
                    <td class="py-3 px-6 text-center">{{ number_format($d->nilai_v, 4) }}</td>
                    <td class="py-3 px-6 text-center">
                        @if($d->status == 'Direkomendasikan')
                            <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full text-xs font-bold">Direkomendasikan</span>
                        @else
                            <span class="bg-gray-200 text-gray-600 py-1 px-3 rounded-full text-xs font-bold">Alternatif</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection