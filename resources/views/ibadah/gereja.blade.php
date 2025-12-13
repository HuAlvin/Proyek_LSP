<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kapel Grace Hall - Kampus LSP</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        campus: { 600: '#2563eb', 800: '#1e40af' },
                        harmony: { 50: '#f0f9ff', 100: '#e0f2fe', 600: '#0284c7', 900: '#0c4a6e' },
                        kapel: { 50: '#f0f9ff', 100: '#e0f2fe', 600: '#0284c7', 700: '#0369a1' } 
                    }
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

<body class="bg-harmony-50 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased transition-colors duration-300 flex flex-col min-h-screen">

    @include('layouts.navbar')

    <main class="flex-grow pt-24 pb-20 px-4 sm:px-6">
        <div class="max-w-screen-xl mx-auto">

            <div class="mb-8">
                <nav class="flex mb-4 text-sm" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 bg-white dark:bg-gray-800 px-4 py-2 rounded-full shadow-sm">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}" class="inline-flex items-center text-gray-700 hover:text-campus-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a1 1 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/></svg>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                                <a href="{{ route('tentang.fasilitas') }}" class="ms-1 text-gray-700 hover:text-campus-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Fasilitas</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                                <span class="ms-1 font-medium text-gray-500 md:ms-2 dark:text-gray-400">Kapel Grace Hall</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="flex flex-wrap items-center gap-3 mb-2">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white tracking-tight">Kapel Grace Hall</h1>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 border border-blue-200">Kristen & Katolik</span>
                </div>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">Ruang hening yang sakral untuk persekutuan, pujian, dan kedamaian batin.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <div class="lg:col-span-8 space-y-8">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
                        <img src="{{ asset('images/gereja.webp') }}" 
                             alt="Interior Kapel Grace Hall" 
                             class="w-full h-[400px] md:h-[500px] object-cover transform group-hover:scale-105 transition-transform duration-700"
                             onerror="this.src='https://images.unsplash.com/photo-1548625361-e8ac7eb777a1?q=80&w=1000&auto=format&fit=crop'">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <span class="bg-kapel-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2 inline-block shadow-md">Sanctuary</span>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-gray-700">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-3">
                            <svg class="w-6 h-6 text-kapel-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Tentang Kapel
                        </h2>
                        <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300 leading-relaxed">
                            <p class="mb-4">
                                Kapel Grace Hall didedikasikan sebagai ruang ibadah inklusif bagi civitas akademika beragama Kristen dan Katolik. Ruangan ini dirancang dengan akustik presisi untuk mendukung kegiatan paduan suara dan musik liturgi.
                            </p>
                            <p>
                                Suasana di dalam kapel dibuat tenang dan sejuk, menjadikannya tempat perlindungan yang sempurna bagi mahasiswa yang mencari ketenangan untuk berdoa secara pribadi maupun mengikuti persekutuan doa bersama.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">

                            <div class="flex items-center p-4 bg-kapel-50 dark:bg-gray-700/50 rounded-xl border border-kapel-100 dark:border-gray-600">
                                <div class="p-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm text-kapel-600 mr-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Kapasitas</p>
                                    <p class="font-bold text-gray-900 dark:text-white">150 Orang</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-indigo-50 dark:bg-gray-700/50 rounded-xl border border-indigo-100 dark:border-gray-600">
                                <div class="p-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm text-indigo-600 mr-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 10l12-3"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Fasilitas</p>
                                    <p class="font-bold text-gray-900 dark:text-white">Organ & Sound System</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 space-y-6 sticky top-24">

                    <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-xl border-t-4 border-kapel-600">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Jadwal & Ibadah</h3>
                        
                        <div class="space-y-4">

                            <div class="flex gap-4 items-start group">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-kapel-100 dark:bg-kapel-900/30 flex items-center justify-center text-kapel-600 dark:text-kapel-400 group-hover:bg-kapel-600 group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white">Kebaktian Padang</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Setiap Jumat Siang</p>
                                </div>
                            </div>

                            <div class="flex gap-4 items-start group">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-kapel-100 dark:bg-kapel-900/30 flex items-center justify-center text-kapel-600 dark:text-kapel-400 group-hover:bg-kapel-600 group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white">Misa Bulanan</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Jumat Pertama</p>
                                </div>
                            </div>

                            <div class="flex gap-4 items-start group">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-kapel-100 dark:bg-kapel-900/30 flex items-center justify-center text-kapel-600 dark:text-kapel-400 group-hover:bg-kapel-600 group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white">Doa Pribadi</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Terbuka setiap hari kerja</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-kapel-600 to-indigo-600 rounded-3xl p-6 shadow-lg text-white relative overflow-hidden">
                        <svg class="absolute bottom-0 right-0 w-32 h-32 text-white/10 -mb-8 -mr-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                        <p class="font-medium italic relative z-10">"Sebab di mana dua atau tiga orang berkumpul dalam Nama-Ku, di situ Aku ada di tengah-tengah mereka."</p>
                        <p class="text-xs mt-3 text-blue-200 relative z-10 font-bold tracking-widest uppercase">— Matius 18:20</p>
                    </div>

                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')

</body>
</html>