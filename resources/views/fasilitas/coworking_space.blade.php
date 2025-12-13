<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coworking Space - Kampus LSP</title>
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
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Coworking Space</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="relative h-[500px] flex items-center justify-center overflow-hidden">
            <img src="https://images.unsplash.com/photo-1527192491265-7e15c55b1ed2?q=80&w=2000&auto=format&fit=crop" 
                 alt="Coworking Space" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative z-10 text-center px-4">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-2">
                    Creative Hub
                </h1>
                <p class="text-xl text-gray-200 font-light">
                    Kolaborasi Tanpa Batas.
                </p>
            </div>
        </div>

        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-screen-xl mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Inkubator Ide Mahasiswa</h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                            Tempat ini dirancang dengan konsep open-plan yang nyaman, menjadi hub bagi mahasiswa untuk berdiskusi, mengerjakan proyek kelompok, atau membangun startup.
                        </p>
                        <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                            <li class="flex items-center"><span class="w-2 h-2 bg-campus-600 rounded-full mr-2"></span>Stopkontak & Port USB di Setiap Meja</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-campus-600 rounded-full mr-2"></span>Dedicated High-Speed Wi-Fi</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-campus-600 rounded-full mr-2"></span>Area Lounge & Beanbag</li>
                        </ul>
                    </div>
                    <div>
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop" alt="Office" class="rounded-xl shadow-lg">
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>