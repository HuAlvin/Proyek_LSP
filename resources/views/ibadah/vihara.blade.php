<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vihara - Kampus LSP</title>
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
                        graha: { 50: '#fff7ed', 100: '#ffedd5', 600: '#ea580c', 700: '#c2410c' } 
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
                                <span class="ms-1 font-medium text-gray-500 md:ms-2 dark:text-gray-400">Vihara</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="flex flex-wrap items-center gap-3 mb-2">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white tracking-tight">Vihara</h1>
                    <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300 border border-orange-200">Buddha & Multifaith</span>
                </div>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">Ruang harmoni untuk meditasi, persembahyangan, dan kedamaian pikiran.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <div class="lg:col-span-8 space-y-8">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
                        <img src="{{ asset('images/vihara.jpg') }}" 
                             alt="Interior Vihara" 
                             class="w-full h-[400px] md:h-[500px] object-cover transform group-hover:scale-105 transition-transform duration-700"
                             onerror="this.src='https://images.unsplash.com/photo-1542042825-b2a7c3096d63?q=80&w=1000&auto=format&fit=crop'">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <span class="bg-graha-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2 inline-block shadow-md">Ruang Hening</span>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-gray-700">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-3">
                            <svg class="w-6 h-6 text-graha-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            Tentang Vihara
                        </h2>
                        <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300 leading-relaxed">
                            <p class="mb-4">
                                Vihara adalah fasilitas kerohanian yang dirancang dengan konsep inklusif untuk memfasilitasi kegiatan ibadah mahasiswa Buddha serta komunitas yang membutuhkan ruang meditasi (mindfulness).
                            </p>
                            <p>
                                Ruangan ini dilengkapi dengan kedap suara yang baik dan pencahayaan alami yang menenangkan, sangat cocok untuk kegiatan Yoga, meditasi, maupun upacara keagamaan yang khidmat.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">

                            <div class="flex items-center p-4 bg-graha-50 dark:bg-gray-700/50 rounded-xl border border-graha-100 dark:border-gray-600">
                                <div class="p-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm text-graha-600 mr-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Kapasitas</p>
                                    <p class="font-bold text-gray-900 dark:text-white">80 Orang</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-amber-50 dark:bg-gray-700/50 rounded-xl border border-amber-100 dark:border-gray-600">
                                <div class="p-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm text-amber-600 mr-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Fasilitas</p>
                                    <p class="font-bold text-gray-900 dark:text-white">Area Meditasi & Yoga</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 space-y-6 sticky top-24">

                    <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-xl border-t-4 border-graha-600">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Jadwal Rutin</h3>
                        
                        <div class="space-y-4">
                            <div class="flex gap-4 items-start group">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-graha-100 dark:bg-graha-900/30 flex items-center justify-center text-graha-600 dark:text-graha-400 group-hover:bg-graha-600 group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white">Sesi Meditasi & Yoga</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Rabu & Jumat Sore</p>
                                </div>
                            </div>

                            <div class="flex gap-4 items-start group">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-graha-100 dark:bg-graha-900/30 flex items-center justify-center text-graha-600 dark:text-graha-400 group-hover:bg-graha-600 group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white">Puja Bhakti</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Jadwal menyesuaikan UKM</p>
                                </div>
                            </div>

                            <div class="flex gap-4 items-start group">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-graha-100 dark:bg-graha-900/30 flex items-center justify-center text-graha-600 dark:text-graha-400 group-hover:bg-graha-600 group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white">Perayaan Hari Besar</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Nyepi, Waisak, Galungan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-graha-600 to-amber-600 rounded-3xl p-6 shadow-lg text-white relative overflow-hidden">
                        <svg class="absolute bottom-0 right-0 w-32 h-32 text-white/10 -mb-8 -mr-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.637.519A3.992 3.992 0 0110 15a3.992 3.992 0 01-1.696-.491 1 1 0 01-.637-.52 3.989 3.989 0 01-2.667 1.02A3.989 3.989 0 012.333 13.95 1 1 0 012.048 12.9l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1zm-5 8.274l-.818 2.552a2 2 0 001.11 2.552 2 2 0 002.552-1.11L10 9.274l2.155 4.99a2 2 0 002.552 1.11 2 2 0 001.11-2.552L15 10.274a2 2 0 00-2 2 2 2 0 00-2-2 2 2 0 00-2 2 2 2 0 00-2-2z" clip-rule="evenodd"></path></svg>
                        <p class="font-medium italic relative z-10">"Kedamaian datang dari dalam. Jangan mencarinya di luar."</p>
                        <p class="text-xs mt-3 text-amber-200 relative z-10 font-bold tracking-widest uppercase">— Buddha Gautama</p>
                    </div>

                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')

</body>
</html>