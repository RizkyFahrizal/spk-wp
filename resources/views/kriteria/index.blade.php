@extends('layouts.main')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Perhitungan AHP & Master Kriteria</h1>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
    
    <div class="bg-white p-6 rounded shadow-lg border-t-4 border-blue-600">
        <h2 class="text-xl font-bold mb-4 text-blue-800">1. Matriks Perbandingan</h2>
        <form action="{{ route('kriteria.proses_ahp') }}" method="POST">
            @csrf
            <div class="overflow-x-auto">
                <table class="min-w-full border text-sm">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border">Kriteria</th>
                            @foreach($kriterias as $k)
                                <th class="p-2 border text-center">{{ $k->kode }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kriterias as $baris)
                        <tr>
                            <td class="p-2 border font-bold bg-gray-50">{{ $baris->kode }}</td>
                            @foreach($kriterias as $kolom)
                                <td class="p-2 border text-center">
                                    @if($baris->id == $kolom->id)
                                        <input type="number" value="1" readonly class="w-12 text-center bg-gray-100 text-gray-400 border-none">
                                        <input type="hidden" name="matrix[{{ $baris->id }}][{{ $kolom->id }}]" value="1">
                                    @else
                                        <input type="number" step="0.001" 
                                            name="matrix[{{ $baris->id }}][{{ $kolom->id }}]" 
                                            value="{{ isset($matriks_awal) ? $matriks_awal[$baris->id][$kolom->id] : '' }}"
                                            class="w-14 text-center border rounded focus:ring-blue-500" 
                                            required>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                    
                    @if(isset($jumlah_kolom))
                    <tfoot class="bg-yellow-100 font-bold">
                        <tr>
                            <td class="p-2 border text-right">TOTAL</td>
                            @foreach($kriterias as $k)
                                <td class="p-2 border text-center text-blue-700">
                                    {{ number_format($jumlah_kolom[$k->id], 3) }}
                                </td>
                            @endforeach
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
            <div class="mt-4 text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow">
                    Hitung AHP
                </button>
            </div>
        </form>
    </div>

    @if(isset($hasil_ahp))
    <div class="bg-white p-6 rounded shadow-lg border-t-4 border-green-500 animate-fade-in-up">
        <h2 class="text-xl font-bold mb-4 text-green-800">2. Matriks Normalisasi</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border text-xs">
                <thead>
                    <tr class="bg-green-50">
                        <th class="p-2 border">Kode</th>
                        @foreach($kriterias as $k)
                            <th class="p-2 border text-center">{{ $k->kode }}</th>
                        @endforeach
                        <th class="p-2 border bg-blue-50 text-center font-bold">Bobot (Avg)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kriterias as $baris)
                    <tr>
                        <td class="p-2 border font-bold">{{ $baris->kode }}</td>
                        @foreach($kriterias as $kolom)
                            <td class="p-2 border text-center">
                                {{ number_format($matriks_norm[$baris->id][$kolom->id], 3) }}
                            </td>
                        @endforeach
                        <td class="p-2 border text-center bg-blue-50 font-bold text-blue-700">
                            {{ number_format($baris->bobot, 3) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
                <tfoot class="bg-green-100 font-bold">
                    <tr>
                        <td class="p-2 border text-right">TOTAL</td>
                        @foreach($kriterias as $k)
                            <td class="p-2 border text-center text-green-800">
                                {{ number_format($total_baris_norm[$k->id], 0) }}
                            </td>
                        @endforeach
                        <td class="p-2 border text-center bg-blue-100">1.000</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @endif
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
        <h3 class="text-lg font-bold text-gray-800">Data Master Kriteria</h3>
    </div>
    <table class="min-w-full table-auto">
        <thead class="bg-gray-800 text-white text-sm uppercase">
            <tr>
                <th class="py-3 px-6 text-left">Kode</th>
                <th class="py-3 px-6 text-left">Nama Kriteria</th>
                <th class="py-3 px-6 text-center">Jenis</th>
                <th class="py-3 px-6 text-center bg-yellow-600">Bobot W</th>
                <th class="py-3 px-6 text-center bg-blue-600">Bobot AHP (Hasil)</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach($kriterias as $k)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left font-bold">{{ $k->kode }}</td>
                <td class="py-3 px-6 text-left">{{ $k->nama }}</td>
                <td class="py-3 px-6 text-center">
                    <span class="{{ $k->jenis == 'benefit' ? 'bg-green-200 text-green-600' : 'bg-red-200 text-red-600' }} py-1 px-3 rounded-full text-xs font-bold">
                        {{ strtoupper($k->jenis) }}
                    </span>
                </td>
                
                <td class="py-3 px-6 text-center font-bold text-yellow-700 bg-yellow-50 text-lg">
                    {{ number_format($k->bobot_w, 0) }}
                </td>
                
                <td class="py-3 px-6 text-center font-bold text-blue-700 bg-blue-50">
                    {{ number_format($k->bobot, 3) }}
                </td>
                
                <td class="py-3 px-6 text-center">
                    <a href="{{ route('kriteria.edit', $k->id) }}" class="text-blue-500 hover:text-blue-700 font-bold">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection