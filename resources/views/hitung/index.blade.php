@extends('layouts.main')        
@section('content')
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">Sistem Pendukung Keputusan (SPK)</h1>
            <p class="text-gray-600 mt-2">Metode Weighted Product (WP) untuk Pemilihan Karyawan Terbaik</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">1. Pilih Karyawan yang Akan Dihitung</h2>
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('hitung.proses') }}" method="POST">
                @csrf
                <div class="mb-4 flex items-center bg-blue-50 p-3 rounded border border-blue-200">
                    <input type="checkbox" id="selectAll" class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500 cursor-pointer">
                    <label for="selectAll" class="ml-2 font-bold text-blue-700 cursor-pointer">Pilih Semua 45 Karyawan</label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    @foreach($karyawans as $karyawan)
                        <div class="flex items-center p-3 border rounded hover:bg-gray-50 transition cursor-pointer">
                            <input id="k-{{ $karyawan->id }}" type="checkbox" name="karyawan_ids[]" value="{{ $karyawan->id }}" 
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="k-{{ $karyawan->id }}" class="ml-2 w-full text-sm font-medium text-gray-900 cursor-pointer">
                                {{ $karyawan->nama }} <span class="text-gray-500 text-xs">({{ $karyawan->jabatan ?? 'Staff' }})</span>
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow-lg transition duration-200 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        Hitung Sekarang
                    </button>
                </div>
            </form>
        </div>

        @if(isset($hasil))
        
        <div class="space-y-8 animate-fade-in-up">
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-800">Tabel 1: Matriks Keputusan (Data Awal)</h3>
                    <p class="text-sm text-gray-500">Data mentah yang diambil dari database berdasarkan karyawan yang dipilih.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alternatif / Nama</th>
                                @foreach($kriterias as $k)
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ $k->kode }}<br>
                                        <span class="text-[10px] {{ $k->jenis == 'benefit' ? 'text-green-600 bg-green-100' : 'text-red-600 bg-red-100' }} px-1 rounded">
                                            {{ $k->jenis }}
                                        </span>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tabel1 as $id_karyawan => $nilai_kriteria)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $karyawans->firstWhere('id', $id_karyawan)->nama }}
                                    </td>
                                    @foreach($kriterias as $k)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
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
                    <h3 class="text-lg font-bold text-gray-800">Tabel 2: Normalisasi Pangkat & Vektor S</h3>
                    <p class="text-sm text-gray-500">Nilai dipangkatkan bobot (Positif=Benefit, Negatif=Cost), lalu dikalikan untuk mendapat Vektor S.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alternatif</th>
                                @foreach($kriterias as $k)
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ $k->kode }} ^ {{ $k->jenis == 'cost' ? '-' : '' }}{{ $k->bobot }}
                                    </th>
                                @endforeach
                                <th class="px-6 py-3 text-center text-xs font-bold text-blue-600 uppercase tracking-wider bg-blue-100">
                                    Vektor S (Π)
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tabel2 as $id_karyawan => $nilai_pangkat)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $karyawans->firstWhere('id', $id_karyawan)->nama }}
                                    </td>
                                    @foreach($kriterias as $k)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                            {{ $nilai_pangkat[$k->id] }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-bold text-blue-600 bg-blue-50">
                                        {{ number_format($vektor_S[$id_karyawan], 4) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-green-500">
                <div class="bg-green-50 px-6 py-4 border-b border-green-200 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-green-800">Tabel 3: Hasil Keputusan (Ranking)</h3>
                        <p class="text-sm text-green-600">Nilai Vektor V diurutkan dari yang terbesar.</p>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-16">Rank</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Nama Karyawan</th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Nilai Preferensi (V)</th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tabel3 as $row)
                                <tr class="{{ $loop->first ? 'bg-yellow-50 border-l-4 border-yellow-400' : 'hover:bg-gray-50' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @if($loop->first)
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full">1 🏆</span>
                                        @else
                                            <span class="text-gray-500 font-bold">{{ $loop->iteration }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $row['nama'] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-gray-700">
                                        {{ number_format($row['nilai'], 4) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        @if($loop->first)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Direkomendasikan
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
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

        </div>
        @endif

<script>
    const selectAllCheckbox = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('input[name="karyawan_ids[]"]');

    selectAllCheckbox.addEventListener('change', function() {
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>
@endsection