<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Library - Kampus LSP</title>
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
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Digital Library</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="relative h-[500px] flex items-center justify-center overflow-hidden">

            <img src="{{ asset('images/librarydigital.jpg') }}" 
                 alt="Library Interior" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gray-900/60"></div>
            <div class="relative z-10 text-center px-4">
                <span class="inline-block py-1 px-3 rounded-full bg-amber-500/20 text-amber-200 border border-amber-400/30 text-xs font-bold tracking-widest uppercase mb-4 backdrop-blur-md">
                    Pusat Pengetahuan
                </span>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-2">
                    Digital Library
                </h1>
                <p class="text-xl text-gray-200 font-light max-w-2xl mx-auto">
                    Akses ribuan koleksi fisik dan digital dalam satu ekosistem belajar yang nyaman dan inspiratif.
                </p>
            </div>
        </div>

        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-screen-xl mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="md:w-1/2">
                        <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=1000&auto=format&fit=crop" 
                             alt="Mahasiswa Belajar" 
                             class="rounded-2xl shadow-xl w-full h-auto object-cover transform hover:scale-[1.02] transition duration-500">
                    </div>
                    <div class="md:w-1/2 space-y-6">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white leading-tight">
                            Lebih Dari Sekadar <span class="text-campus-600 dark:text-blue-400">Tempat Membaca</span>
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg">
                            Perpustakaan Kampus LSP dirancang sebagai <i>Learning Commons</i>. Kami menyediakan ruang kolaborasi modern, akses jurnal internasional terindeks, dan koleksi e-book yang dapat diakses 24/7 dari mana saja.
                        </p>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg">
                            Didukung dengan sistem sirkulasi mandiri (RFID) yang memungkinkan mahasiswa meminjam dan mengembalikan buku tanpa antre.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-screen-xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Fasilitas Penunjang</h3>
                    <div class="w-20 h-1 bg-campus-600 mx-auto mt-4 rounded-full"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm text-center border border-gray-100 dark:border-gray-700 hover:shadow-lg transition-shadow group">
                        <div class="w-16 h-16 mx-auto bg-blue-100 dark:bg-blue-900/30 rounded-2xl flex items-center justify-center mb-6 text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h4 class="font-bold text-xl mb-3 text-gray-900 dark:text-white">E-Resources</h4>
                        <p class="text-gray-500 dark:text-gray-400 leading-relaxed">Akses gratis ke ribuan jurnal internasional (Scopus, IEEE) dan e-book akademik.</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm text-center border border-gray-100 dark:border-gray-700 hover:shadow-lg transition-shadow group">
                        <div class="w-16 h-16 mx-auto bg-amber-100 dark:bg-amber-900/30 rounded-2xl flex items-center justify-center mb-6 text-amber-600 dark:text-amber-400 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h4 class="font-bold text-xl mb-3 text-gray-900 dark:text-white">Co-Working Space</h4>
                        <p class="text-gray-500 dark:text-gray-400 leading-relaxed">Ruang diskusi kedap suara, area lesehan nyaman, dan bilik studi privat.</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm text-center border border-gray-100 dark:border-gray-700 hover:shadow-lg transition-shadow group">
                        <div class="w-16 h-16 mx-auto bg-green-100 dark:bg-green-900/30 rounded-2xl flex items-center justify-center mb-6 text-green-600 dark:text-green-400 group-hover:bg-green-600 group-hover:text-white transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="font-bold text-xl mb-3 text-gray-900 dark:text-white">RFID Self-Service</h4>
                        <p class="text-gray-500 dark:text-gray-400 leading-relaxed">Kios peminjaman dan pengembalian buku mandiri yang cepat tanpa antre.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>