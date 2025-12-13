<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratorium Komputer - Kampus LSP</title>

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

        <div class="pt-24 pb-8 px-4 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-screen-xl mx-auto">
                <nav class="flex mb-4" aria-label="Breadcrumb">
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
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Lab Komputer</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white md:text-4xl">Laboratorium Komputer Terpadu</h1>
            </div>
        </div>

        <section class="py-12 px-4">
            <div class="max-w-screen-xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                    
                    <div class="relative w-full">
                        <div class="relative w-full pt-[56.25%] bg-black rounded-xl shadow-2xl overflow-hidden border-4 border-white dark:border-gray-700">
                            <iframe class="absolute top-0 left-0 w-full h-full" 
                                    src="https://www.youtube.com/embed/J6o6y5CZxaA?si=CIH4NgoI_QQ7Zn7P" 
                                    title="Video Profil Lab Komputer" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    allowfullscreen>
                            </iframe>
                        </div>
                        <p class="mt-3 text-sm text-center text-gray-500 dark:text-gray-400 italic">
                            Video Profil Fasilitas Laboratorium Komputer Kampus LSP
                        </p>
                    </div>

                    <div class="space-y-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Pusat Inovasi Digital</h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                            Laboratorium Komputer Kampus LSP dirancang untuk memenuhi kebutuhan praktikum mahasiswa di era industri 4.0. Dengan total 50 unit komputer berspesifikasi tinggi, laboratorium ini mendukung berbagai kegiatan mulai dari pemrograman dasar, pengembangan aplikasi mobile, desain grafis, hingga pengolahan Big Data.
                        </p>
                        <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                            Fasilitas ini juga dilengkapi dengan koneksi internet berkecepatan tinggi (Dedicated 1 Gbps) dan beroperasi penuh 24 jam untuk mendukung kegiatan riset mahasiswa tingkat akhir.
                        </p>
                        
                        <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Ruangan Full AC & Kedap Suara
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Proyektor Smart 4K
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Server Praktikum Lokal
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <section class="py-12 bg-white dark:bg-gray-800 transition-colors duration-300">
            <div class="max-w-screen-xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Spesifikasi Perangkat</h2>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">Standar industri untuk performa maksimal.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl border border-gray-200 dark:border-gray-600 text-center hover:-translate-y-1 transition-transform">
                        <div class="w-12 h-12 mx-auto bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-1">Processor</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Intel Core i7 Gen 12</p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl border border-gray-200 dark:border-gray-600 text-center hover:-translate-y-1 transition-transform">
                        <div class="w-12 h-12 mx-auto bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-1">Memory (RAM)</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">32 GB DDR4 3200MHz</p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl border border-gray-200 dark:border-gray-600 text-center hover:-translate-y-1 transition-transform">
                        <div class="w-12 h-12 mx-auto bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-1">Graphic Card</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">NVIDIA RTX 3060 12GB</p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl border border-gray-200 dark:border-gray-600 text-center hover:-translate-y-1 transition-transform">
                        <div class="w-12 h-12 mx-auto bg-red-100 dark:bg-red-900 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-red-600 dark:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-1">Network</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">1 Gbps Fiber Optic</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-12 px-4">
            <div class="max-w-screen-xl mx-auto">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Software Pendukung</h3>
                <div class="flex flex-wrap gap-4">
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-4 py-2 rounded-full dark:bg-blue-900 dark:text-blue-300">Visual Studio Code</span>
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-4 py-2 rounded-full dark:bg-blue-900 dark:text-blue-300">Android Studio</span>
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-4 py-2 rounded-full dark:bg-blue-900 dark:text-blue-300">Adobe Creative Cloud</span>
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-4 py-2 rounded-full dark:bg-blue-900 dark:text-blue-300">XAMPP / Laragon</span>
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-4 py-2 rounded-full dark:bg-blue-900 dark:text-blue-300">Python (Anaconda)</span>
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-4 py-2 rounded-full dark:bg-blue-900 dark:text-blue-300">Postman</span>
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-4 py-2 rounded-full dark:bg-blue-900 dark:text-blue-300">Git</span>
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-4 py-2 rounded-full dark:bg-blue-900 dark:text-blue-300">Figma</span>
                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>