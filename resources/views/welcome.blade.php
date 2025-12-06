<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK - Kelompok 2</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* CSS Animasi Typewriter */
        .typewriter h1 {
            overflow: hidden;
            border-right: .15em solid #2563EB;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .10em;
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
        }
        @keyframes typing { from { width: 0 } to { width: 100% } }
        @keyframes blink-caret { from, to { border-color: transparent } 50% { border-color: #2563EB } }

        .fade-in-up {
            animation: fadeInUp 1.5s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }

        /* Delay Animasi (Diatur urutannya) */
        .delay-1000 { animation-delay: 1s; } /* Subjudul */
        .delay-2000 { animation-delay: 1.8s; } /* Daftar Nama */
        .delay-3000 { animation-delay: 2.8s; } /* Tombol Mulai */

        .bg-grid-pattern {
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 24px 24px;
        }

        .page-exit-active {
            opacity: 0;
            transform: scale(1.5);
            filter: blur(10px);
        }
        
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased overflow-hidden">

    <div id="main-container" class="relative min-h-screen flex flex-col justify-center items-center overflow-hidden transition-all duration-700 ease-in-out transform">
        
        <div class="absolute inset-0 bg-grid-pattern opacity-40"></div>
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>

        <div class="z-10 text-center px-4 w-full max-w-4xl">
            
            <div class="mb-6 flex justify-center fade-in-up">
                <div class="bg-white p-4 rounded-full shadow-lg border border-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z" />
                    </svg>
                </div>
            </div>

            <div class="typewriter mb-4">
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-blue-500 pb-2">
                    Sistem Pendukung Keputusan
                </h1>
            </div>

            <div class="fade-in-up delay-1000">
                <h2 class="text-lg md:text-xl text-gray-500 font-medium mb-2">
                    Metode Weighted Product (WP)
                </h2>
                <div class="flex justify-center items-center gap-3 mt-4 mb-8">
                    <span class="h-px w-12 bg-gray-300"></span>
                    <span class="text-xs font-bold text-blue-600 tracking-widest uppercase bg-blue-50 px-3 py-1 rounded-full border border-blue-100">
                        Kelompok 2
                    </span>
                    <span class="h-px w-12 bg-gray-300"></span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left fade-in-up delay-2000 max-w-2xl mx-auto">
                <div class="bg-white/80 backdrop-blur-sm px-5 py-3 rounded-lg border border-blue-100 shadow-sm hover:shadow-md transition hover:-translate-y-1">
                    <p class="font-bold text-gray-800 text-sm">Muhammad Rizky Fahrizal</p>
                    <p class="text-xs text-blue-500 font-mono mt-1">22082010041</p>
                </div>
                <div class="bg-white/80 backdrop-blur-sm px-5 py-3 rounded-lg border border-blue-100 shadow-sm hover:shadow-md transition hover:-translate-y-1">
                    <p class="font-bold text-gray-800 text-sm">Pramudya Abimanyu</p>
                    <p class="text-xs text-blue-500 font-mono mt-1">22082010190</p>
                </div>
                <div class="bg-white/80 backdrop-blur-sm px-5 py-3 rounded-lg border border-blue-100 shadow-sm hover:shadow-md transition hover:-translate-y-1">
                    <p class="font-bold text-gray-800 text-sm">Hussein Muhammad Ibrahim</p>
                    <p class="text-xs text-blue-500 font-mono mt-1">22082010132</p>
                </div>
                <div class="bg-white/80 backdrop-blur-sm px-5 py-3 rounded-lg border border-blue-100 shadow-sm hover:shadow-md transition hover:-translate-y-1">
                    <p class="font-bold text-gray-800 text-sm">Alfathur Rabbani</p>
                    <p class="text-xs text-blue-500 font-mono mt-1">22082010194</p>
                </div>
            </div>

            <div class="mt-10 fade-in-up delay-3000">
                <a href="{{ route('hitung.index') }}" id="start-btn" class="group relative inline-flex items-center justify-center px-8 py-3 text-lg font-bold text-white transition-all duration-200 bg-blue-600 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg hover:shadow-blue-500/30">
                    <span class="relative flex items-center gap-2">
                        Mulai Aplikasi
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </span>
                </a>
            </div>

        </div>

        <div class="absolute bottom-4 text-gray-400 text-xs fade-in-up delay-3000">
            &copy; {{ date('Y') }} Project SPK Laravel v10
        </div>

    </div>

    <script>
        document.getElementById('start-btn').addEventListener('click', function(e) {
            e.preventDefault();
            const targetUrl = this.href;
            const container = document.getElementById('main-container');
            container.classList.add('page-exit-active');
            setTimeout(function() {
                window.location.href = targetUrl;
            }, 700); 
        });
    </script>

</body>
</html>