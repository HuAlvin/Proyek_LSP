<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Classroom - Kampus LSP</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: { campus: { 600: '#2563eb', 800: '#1e40af' } },
                    fontFamily: { sans: ['Figtree', 'sans-serif'] }
                }
            }
        }
    </script>
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased transition-colors duration-300 flex flex-col min-h-screen">

    @include('layouts.navbar')

    <main class="flex-grow">

        <div class="pt-24 pb-4 px-4 bg-white dark:bg-gray-900">
            <div class="max-w-screen-xl mx-auto">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-campus-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a1 1 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/></svg>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                                <a href="{{ route('tentang.fasilitas') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-campus-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Fasilitas</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Smart Classroom</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="relative h-[500px] flex items-center justify-center overflow-hidden">
            <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=2000&auto=format&fit=crop" 
                 alt="Smart Classroom" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative z-10 text-center px-4">
                <span class="inline-block py-1 px-3 rounded-full bg-blue-500/20 text-blue-200 border border-blue-400/30 text-xs font-bold tracking-widest uppercase mb-4 backdrop-blur-md">
                    Fasilitas Unggulan
                </span>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-2">
                    Smart Classroom
                </h1>
                <p class="text-xl text-gray-200 font-light">
                    Interaktif. Cerdas. Hybrid.
                </p>
            </div>
        </div>

        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-screen-xl mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center gap-10">
                    <div class="md:w-1/2">
                        <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=1000&auto=format&fit=crop" 
                             alt="Interactive Learning" 
                             class="rounded-2xl shadow-lg w-full h-auto">
                    </div>
                    <div class="md:w-1/2 space-y-4">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Pembelajaran Masa Depan</h2>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Ruang kelas ini dirancang untuk mendukung metode pembelajaran modern. Tidak ada lagi papan tulis kapur; kami menggunakan panel layar sentuh digital yang terhubung langsung ke perangkat mahasiswa.
                        </p>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Teknologi Hybrid memungkinkan mahasiswa untuk mengikuti kelas dari mana saja dengan pengalaman yang sama seperti hadir secara fisik.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-screen-xl mx-auto px-4">
                <h3 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-10">Fitur Utama</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm text-center border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 mx-auto bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center mb-4 text-blue-600 dark:text-blue-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="font-bold text-lg mb-2 text-gray-900 dark:text-white">Interactive Panel</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Layar sentuh 86" 4K sebagai papan tulis digital.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm text-center border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 mx-auto bg-purple-100 dark:bg-purple-900/50 rounded-full flex items-center justify-center mb-4 text-purple-600 dark:text-purple-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="font-bold text-lg mb-2 text-gray-900 dark:text-white">AI Tracking Cam</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Kamera pintar yang mengikuti pergerakan dosen.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm text-center border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 mx-auto bg-green-100 dark:bg-green-900/50 rounded-full flex items-center justify-center mb-4 text-green-600 dark:text-green-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="font-bold text-lg mb-2 text-gray-900 dark:text-white">Tablet Ready</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Integrasi penuh dengan tablet dan smartphone.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>