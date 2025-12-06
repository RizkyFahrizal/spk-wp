<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem SPK Metode WP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav class="bg-blue-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <a href="{{ url('/') }}" class="flex items-center py-4 px-2 text-white font-bold text-lg">
                            SPK WP
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="{{ route('hitung.index') }}" class="py-4 px-2 text-blue-200 hover:text-white transition duration-300">Hitung</a>
                        <a href="{{ route('riwayat.index') }}" class="py-4 px-2 text-blue-200 hover:text-white transition duration-300">Riwayat Hitung</a>
                        <a href="{{ route('karyawan.index') }}" class="py-4 px-2 text-blue-200 hover:text-white transition duration-300">Data Karyawan</a>
                        <a href="{{ route('kriteria.index') }}" class="py-4 px-2 text-blue-200 hover:text-white transition duration-300">Data Kriteria</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8 max-w-7xl">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </div>

</body>
</html>