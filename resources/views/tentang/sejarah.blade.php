<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sejarah - Kampus LSP</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        campus: { 600: '#2563eb', 800: '#1e40af' }
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

<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased transition-colors duration-300 flex flex-col min-h-screen">

    @include('layouts.navbar')

    <main class="flex-grow">
        
        <section class="relative pt-32 pb-16 bg-white dark:bg-gray-800 overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
            <div class="relative max-w-screen-xl mx-auto px-4 text-center">
                <span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-campus-600 text-xs font-bold tracking-widest mb-2 dark:bg-blue-900 dark:text-blue-300">PERJALANAN KAMI</span>
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl">Sejarah Kampus LSP</h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-400">
                    Dedikasi panjang dalam mencetak generasi unggul yang siap bersaing di era global.
                </p>
            </div>
        </section>

        <section class="py-16">
            <div class="max-w-screen-md mx-auto px-4">
                
                <div class="mb-12 text-center md:text-left">
                    <p class="text-lg leading-relaxed text-gray-600 dark:text-gray-300">
                        Kampus LSP didirikan dengan semangat untuk memberikan akses pendidikan berkualitas bagi seluruh lapisan masyarakat. Bermula dari sebuah ruko kecil dengan satu program studi, kini kami telah berkembang menjadi institusi pendidikan terdepan di bidang teknologi dan bisnis.
                    </p>
                </div>

                <ol class="relative border-l border-gray-200 dark:border-gray-700 ml-4 md:ml-0">                  
                    
                    <li class="mb-10 ml-8">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-campus-600 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-blue-600">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </span>
                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-2">
                                <time class="block mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">1998</time>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Awal Mula</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Pendirian Yayasan LSP</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                Kampus LSP resmi didirikan pada tanggal 10 Mei 2010 oleh Yayasan Pendidikan LSP. Pada awal berdirinya, kampus ini hanya memiliki satu program studi yaitu D3 Manajemen Informatika dengan jumlah mahasiswa angkatan pertama sebanyak 50 orang.
                            </p>
                        </div>
                    </li>

                    <li class="mb-10 ml-8">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </span>
                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transition-shadow">
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">2015</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Transformasi Menjadi Sekolah Tinggi</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                Seiring dengan tingginya minat masyarakat, status kampus ditingkatkan menjadi Sekolah Tinggi. Pada tahun ini dibuka Program Studi S1 Teknik Informatika dan S1 Sistem Informasi. Gedung kampus baru berlantai 4 diresmikan untuk menunjang kegiatan belajar mengajar.
                            </p>
                        </div>
                    </li>

                    <li class="mb-10 ml-8">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </span>
                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transition-shadow">
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">2020</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Era Digitalisasi & Kampus Merdeka</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                Menghadapi pandemi dan era digital, Kampus LSP meluncurkan sistem pembelajaran Hybrid Learning. Di tahun ini pula, kami resmi menjalin kerjasama dengan 50+ perusahaan teknologi untuk program magang Kampus Merdeka.
                            </p>
                        </div>
                    </li>

                    <li class="ml-8">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-4 h-4 text-campus-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </span>
                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-2">
                                <time class="block mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">2025 - Sekarang</time>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Saat Ini</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Menuju Universitas Digital</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                Kini Kampus LSP memiliki lebih dari 5.000 mahasiswa aktif dan membuka Program Studi baru "Bisnis Digital". Visi kami adalah menjadi Universitas berbasis teknologi terbaik di tingkat nasional pada tahun 2030.
                            </p>
                        </div>
                    </li>

                </ol>
            </div>
        </section>

        <section class="bg-gray-50 dark:bg-gray-800 py-16 transition-colors duration-300">
            <div class="max-w-screen-xl mx-auto px-4">
                <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-8">Galeri Perjalanan</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=600&auto=format&fit=crop" alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=600&auto=format&fit=crop" alt="">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1592280771190-3e2e4d571952?q=80&w=600&auto=format&fit=crop" alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=600&auto=format&fit=crop" alt="">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=600&auto=format&fit=crop" alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1606761568499-6d2451b23c66?q=80&w=600&auto=format&fit=crop" alt="">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1564981797816-1043664bf78d?q=80&w=600&auto=format&fit=crop" alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=600&auto=format&fit=crop" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer')

</body>
</html>