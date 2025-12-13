<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auditorium - Kampus LSP</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: { colors: { campus: { 600: '#2563eb', 800: '#1e40af' } } }
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

<body class="bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased transition-colors duration-300 flex flex-col min-h-screen">

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
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Auditorium</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="relative h-[60vh] min-h-[500px] flex items-center justify-center overflow-hidden">
            <img src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?q=80&w=1600&auto=format&fit=crop" 
                 alt="Auditorium Background" 
                 class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-gray-900/30"></div>

            <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
                <span class="inline-block py-1 px-3 rounded-full bg-amber-500/20 text-amber-300 border border-amber-500/30 text-xs font-bold tracking-widest mb-4 backdrop-blur-md">
                    KAPASITAS 1.500 ORANG
                </span>
                <h1 class="text-5xl md:text-6xl font-extrabold text-white tracking-tight mb-4 drop-shadow-lg">
                    Auditorium Serbaguna
                </h1>
                <p class="text-xl text-gray-200 max-w-2xl mx-auto font-light leading-relaxed drop-shadow-md">
                    Panggung megah untuk wisuda, seminar, dan seni.
                </p>
            </div>
        </div>

        <section class="py-16">
            <div class="max-w-screen-xl mx-auto px-4">
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-xl border-t-4 border-amber-500">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Dolby Surround Sound</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Sistem tata suara akustik presisi.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-xl border-t-4 border-blue-500">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Giant Videotron</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Layar LED 12x6 meter.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-xl border-t-4 border-red-500">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Theater Seating</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Kursi teater berjenjang yang empuk.</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center gap-12 bg-gray-50 dark:bg-gray-800/50 rounded-3xl p-8 md:p-12">
                    <div class="md:w-1/2 space-y-6">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Venue Prestisius Kampus</h2>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Auditorium ini dirancang sebagai pusat kebudayaan dan intelektual. Dengan backstage luas, ruang VIP, dan pencahayaan teatrikal, gedung ini siap menampung berbagai skala acara.
                        </p>
                    </div>
                    <div class="md:w-1/2">
                        <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?q=80&w=800&auto=format&fit=crop" alt="Auditorium Crowd" class="rounded-2xl shadow-lg w-full h-auto">
                    </div>
                </div>

            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>