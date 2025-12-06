@extends('layouts.main')

@section('content')

    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-800">Perhitungan SPK (Metode WP)</h1>
        <p class="text-gray-600 mt-2">Pilih karyawan di bawah ini untuk memulai perhitungan ranking.</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 mb-8 border-t-4 border-blue-600">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">1. Seleksi Karyawan</h2>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Error!</strong> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('hitung.proses') }}" method="POST">
            @csrf
            
            <div class="mb-4 flex items-center bg-blue-50 p-3 rounded border border-blue-200">
                <input type="checkbox" id="selectAll" class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500 cursor-pointer">
                <label for="selectAll" class="ml-2 font-bold text-blue-700 cursor-pointer">Pilih Semua Data Karyawan</label>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6 max-h-60 overflow-y-auto p-2 border rounded bg-gray-50">
                @foreach($karyawans as $karyawan)
                    <div class="flex items-center p-2 border bg-white rounded hover:bg-gray-100 transition cursor-pointer">
                        <input id="k-{{ $karyawan->id }}" type="checkbox" name="karyawan_ids[]" value="{{ $karyawan->id }}" 
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="k-{{ $karyawan->id }}" class="ml-2 w-full text-sm font-medium text-gray-900 cursor-pointer truncate">
                            {{ $karyawan->nama }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow-lg transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Hitung Ranking
                </button>
            </div>
        </form>
    </div>

    @if(isset($hasil))
    
    <div class="space-y-8 animate-fade-in-up mb-12">
        
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-800">Tabel 1: Data Nilai Awal</h3>
                <p class="text-xs text-gray-500">Data mentah dari database.</p>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">Nama Karyawan</th>
                            @foreach($kriterias as $k)
                                <th class="px-6 py-3 text-center">
                                    {{ $k->kode }}<br>
                                    <span class="text-[10px] bg-white text-gray-800 px-1 rounded opacity-75">
                                        {{ $k->jenis }}
                                    </span>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($tabel1 as $id_karyawan => $nilai_kriteria)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 font-medium text-gray-900">
                                    {{ $karyawans->firstWhere('id', $id_karyawan)->nama }}
                                </td>
                                @foreach($kriterias as $k)
                                    <td class="px-6 py-3 text-center text-gray-600">
                                        {{ $nilai_kriteria[$k->id] }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-800">Tabel 2: Perbaikan Bobot & Vektor S</h3>
                <p class="text-xs text-gray-500">Nilai dipangkatkan dengan bobot AHP (Positif utk Benefit, Negatif utk Cost).</p>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">Nama Karyawan</th>
                            @foreach($kriterias as $k)
                                <th class="px-6 py-3 text-center" title="Bobot: {{ $k->bobot }}">
                                    {{ $k->kode }} ^ {{ $k->jenis == 'cost' ? '-' : '' }}{{ number_format($k->bobot, 2) }}
                                </th>
                            @endforeach
                            <th class="px-6 py-3 text-center bg-blue-800 font-bold">
                                Vektor S (Π)
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($tabel2 as $id_karyawan => $nilai_pangkat)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 font-medium text-gray-900">
                                    {{ $karyawans->firstWhere('id', $id_karyawan)->nama }}
                                </td>
                                @foreach($kriterias as $k)
                                    <td class="px-6 py-3 text-center text-gray-500">
                                        {{ number_format($nilai_pangkat[$k->id], 4) }}
                                    </td>
                                @endforeach
                                <td class="px-6 py-3 text-center font-bold text-blue-700 bg-blue-50">
                                    {{ number_format($vektor_S[$id_karyawan], 4) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-green-500">
            <div class="bg-green-50 px-6 py-4 border-b border-green-200">
                <h3 class="text-lg font-bold text-green-800">Tabel 3: Hasil Keputusan (Ranking Akhir)</h3>
                <p class="text-xs text-green-600">Diurutkan dari nilai Preferensi (V) tertinggi.</p>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-center font-bold text-gray-700 w-16">Rank</th>
                            <th class="px-6 py-3 text-left font-bold text-gray-700">Nama Karyawan</th>
                            <th class="px-6 py-3 text-center font-bold text-gray-700">Nilai V</th>
                            <th class="px-6 py-3 text-center font-bold text-gray-700">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($tabel3 as $row)
                            <tr class="{{ $loop->first ? 'bg-yellow-50 border-l-4 border-yellow-400' : 'hover:bg-gray-50' }}">
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($loop->first)
                                        <span class="bg-yellow-400 text-white text-xs font-bold px-2 py-1 rounded shadow">1 🏆</span>
                                    @else
                                        <span class="text-gray-500 font-bold text-lg">{{ $loop->iteration }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $row['nama'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-gray-800">
                                    {{ number_format($row['nilai'], 4) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                    @if($loop->iteration <= 3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Direkomendasikan
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-600">
                                            Alternatif
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <form action="{{ route('riwayat.store') }}" method="POST" onsubmit="return confirm('Simpan hasil perhitungan ini ke riwayat?')">
                @csrf
                <input type="hidden" name="karyawan_ids_string" value="{{ implode(',', request()->karyawan_ids) }}">
                
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded shadow-lg flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    Simpan Hasil ke Riwayat
                </button>
            </form>
        </div>
    </div>
    @endif

    <script>
        // Script untuk Select All Checkbox
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('input[name="karyawan_ids[]"]');

        if(selectAll){
            selectAll.addEventListener('change', function() {
                checkboxes.forEach(chk => {
                    chk.checked = this.checked;
                });
            });
        }
    </script>

@endsection