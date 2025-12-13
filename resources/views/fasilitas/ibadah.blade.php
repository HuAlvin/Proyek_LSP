<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fasilitas Ibadah - Kampus LSP</title>
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
                        harmony: { 50: '#f0f9ff', 100: '#e0f2fe', 600: '#0284c7', 900: '#0c4a6e' }
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
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Pusat Ibadah</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="pt-8 pb-16 px-4 text-center bg-white dark:bg-gray-800 rounded-b-[3rem] shadow-sm mb-12">
            <div class="max-w-4xl mx-auto">
                <span class="text-harmony-600 dark:text-harmony-400 font-bold tracking-wider text-sm uppercase mb-2 block">Religious Center</span>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Harmoni dalam Keberagaman
                </h1>
                <div class="relative w-full h-64 md:h-96 rounded-2xl overflow-hidden shadow-2xl mx-auto max-w-5xl">
                    <img src="https://images.unsplash.com/photo-1519817650390-64a93db51149?q=80&w=1200&auto=format&fit=crop" 
                         alt="Harmony Architecture" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>
            </div>
        </div>

        <section class="py-16 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-screen-xl mx-auto px-4 pb-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Sarana Ibadah</h2>
                    <div class="w-20 h-1 bg-campus-600 mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <a href="{{ route('fasilitas.masjid') }}" class="block bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all border border-gray-100 dark:border-gray-700 group">

                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-campus-600 transition-colors">Masjid Ulul Albab</h3>

                        <div class="relative h-48 mb-4 rounded-lg overflow-hidden">

                            <img src="{{ asset('images/masjid.jpg') }}" 
                                 alt="Masjid Ulul Albab" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                 onerror="this.src='https://images.unsplash.com/photo-1564648351416-3eec9f3e85de?q=80&w=1000&auto=format&fit=crop'">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                        </div>

                        <p class="text-gray-600 dark:text-gray-400 text-sm">Kapasitas 2.000 jamaah dengan ruang wudhu modern dan area kajian yang nyaman.</p>
                        <div class="mt-4"><span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-1 rounded border border-green-200">Islam</span></div>
                    </a>

                    <a href="{{ route('fasilitas.kapel') }}" class="block bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all border border-gray-100 dark:border-gray-700 group">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-campus-600 transition-colors">Kapel Grace Hall</h3>
                        
                        <div class="relative h-48 mb-4 rounded-lg overflow-hidden">
                            <img src="{{ asset('images/gereja.webp') }}" 
                                 alt="Kapel Grace Hall" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                 onerror="this.src='https://images.unsplash.com/photo-1548625361-e8ac7eb777a1?q=80&w=1000&auto=format&fit=crop'">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                        </div>

                        <p class="text-gray-600 dark:text-gray-400 text-sm">Ruang hening untuk kebaktian dan misa dengan akustik ruangan yang sangat baik.</p>
                        <div class="mt-4 flex gap-2">
                            <span class="text-xs font-semibold bg-blue-100 text-blue-700 px-2 py-1 rounded border border-blue-200">Kristen</span>
                            <span class="text-xs font-semibold bg-blue-100 text-blue-700 px-2 py-1 rounded border border-blue-200">Katolik</span>
                        </div>
                    </a>

                    <a href="{{ route('fasilitas.graha') }}" class="block bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all border border-gray-100 dark:border-gray-700 group">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-campus-600 transition-colors">Graha Dharma</h3>
                        
                        <div class="relative h-48 mb-4 rounded-lg overflow-hidden">
                            <img src="{{ asset('images/vihara.jpg') }}" 
                                 alt="Graha Dharma" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                 onerror="this.src='https://images.unsplash.com/photo-1542042825-b2a7c3096d63?q=80&w=1000&auto=format&fit=crop'">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                        </div>

                        <p class="text-gray-600 dark:text-gray-400 text-sm">Bilik doa khusus yang tenang untuk meditasi dan kegiatan keagamaan lainnya.</p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="text-xs font-semibold bg-orange-100 text-orange-700 px-2 py-1 rounded border border-orange-200">Buddha</span>
                        </div>
                    </a>

                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>