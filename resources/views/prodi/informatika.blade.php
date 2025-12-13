<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S1 Teknik Informatika - Kampus LSP</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700,800&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        campus: {
                            50: '#eff6ff', 100: '#dbeafe', 500: '#3b82f6', 600: '#2563eb', 800: '#1e40af', 900: '#1e3a8a',
                        },
                        tech: {
                            50: '#ecfeff',
                            100: '#cffafe',
                            400: '#22d3ee',
                            500: '#06b6d4',
                            600: '#0891b2',
                            700: '#0e7490',
                            900: '#164e63',
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'spin-slow': 'spin 12s linear infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        .reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s ease-out; }
        .reveal.active { opacity: 1; transform: translateY(0); }
        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }
    </style>

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="antialiased font-sans text-gray-700 bg-gray-50 dark:bg-gray-950 dark:text-gray-200 transition-colors duration-300 flex flex-col min-h-screen">

    @include('layouts.navbar')

    <main class="flex-grow">
        <section class="relative h-[550px] flex items-center justify-center overflow-hidden bg-gray-900">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-tech-900 to-slate-900 z-0"></div>

            <div class="absolute inset-0 opacity-20 z-0" 
                 style="background-image: linear-gradient(rgba(6, 182, 212, 0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(6, 182, 212, 0.3) 1px, transparent 1px); background-size: 40px 40px;">
            </div>

            <div class="absolute top-20 left-20 w-24 h-24 bg-tech-500/20 rounded-full blur-xl animate-pulse-slow"></div>
            <div class="absolute bottom-20 right-20 w-32 h-32 bg-blue-500/20 rounded-full blur-xl animate-pulse-slow delay-300"></div>
            
            <div class="relative z-20 px-4 mx-auto max-w-screen-xl text-center">
                <div class="animate-float">
                    <span class="inline-flex items-center py-1 px-3 rounded-full bg-tech-900/50 border border-tech-500/50 text-tech-300 text-sm font-semibold mb-6 backdrop-blur-md shadow-[0_0_15px_rgba(6,182,212,0.3)]">
                        <span class="w-2 h-2 rounded-full bg-tech-400 mr-2 animate-pulse"></span>
                        Program Sarjana (S1)
                    </span>
                </div>
                
                <h1 class="mb-6 text-5xl font-extrabold tracking-tight leading-none text-white md:text-6xl lg:text-7xl drop-shadow-2xl reveal active">
                    Teknik <span class="text-transparent bg-clip-text bg-gradient-to-r from-tech-400 to-blue-400">Informatika</span>
                </h1>
                
                <p class="mb-10 text-lg font-light text-gray-300 lg:text-xl sm:px-16 lg:px-48 reveal active delay-100 max-w-4xl mx-auto">
                    Menjadi arsitek masa depan digital dengan menguasai <span class="font-semibold text-white">Software Engineering</span>, <span class="font-semibold text-white">Artificial Intelligence</span>, dan <span class="font-semibold text-white">Cyber Security</span>.
                </p>
                
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 reveal active delay-200">
                    @if (Route::has('register'))
                        <a href="{{ route('pendaftaran.create') }}" class="group relative inline-flex justify-center items-center py-3.5 px-8 text-base font-bold text-white rounded-full bg-tech-600 hover:bg-tech-500 transition-all hover:scale-105 hover:shadow-[0_0_20px_rgba(8,145,178,0.6)]">
                            <span class="mr-2">Daftar Sekarang</span>
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </a>
                    @endif
                    
                    <a href="#kurikulum" class="inline-flex justify-center items-center py-3.5 px-8 text-base font-medium text-center text-white rounded-full border border-tech-500/30 bg-tech-900/10 hover:bg-tech-900/30 backdrop-blur-sm focus:ring-4 focus:ring-tech-900 transition-all">
                        Lihat Kurikulum
                    </a>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white dark:bg-gray-900 relative overflow-hidden">
            <div class="absolute -right-20 top-40 text-9xl font-mono text-gray-50 dark:text-gray-800 opacity-50 rotate-12 select-none pointer-events-none font-bold">
                &lt;/&gt;
            </div>

            <div class="container mx-auto px-4 max-w-screen-xl relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="w-full lg:w-1/2 reveal">

                        <div class="relative group">
                            <div class="absolute -inset-4 bg-gradient-to-r from-tech-500 to-blue-600 rounded-2xl opacity-30 blur-lg group-hover:opacity-50 transition duration-500"></div>
                            
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white dark:border-gray-800">
                                <img src="{{ asset('images/code.webp') }}" 
                                     alt="Mahasiswa Coding" 
                                     class="w-full object-cover h-[400px] transform group-hover:scale-105 transition duration-700"
                                     onerror="this.src='https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'">

                                <div class="absolute bottom-6 left-6 right-6 bg-gray-900/90 backdrop-blur-md p-4 rounded-xl border border-gray-700 shadow-xl animate-float">
                                    <div class="flex items-center gap-4">
                                        <div class="bg-tech-500/20 p-3 rounded-lg text-tech-400">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-tech-300 font-mono">Status</p>
                                            <p class="text-white font-bold">Terakreditasi Unggul</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="w-full lg:w-1/2 reveal delay-100">
                        <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-6 leading-tight">
                            Membangun Solusi Cerdas Melalui <span class="text-transparent bg-clip-text bg-gradient-to-r from-tech-600 to-blue-500">Teknologi</span>
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-8 text-lg leading-relaxed">
                            Di Program Studi Teknik Informatika Kampus LSP, Anda akan dibimbing untuk tidak sekadar menjadi pengguna teknologi, tetapi pencipta inovasi. Fokus kami adalah mencetak lulusan yang handal dalam pengembangan perangkat lunak skala enterprise, keamanan siber, dan infrastruktur cloud.
                        </p>
                        
                        <div class="space-y-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-tech-100 dark:bg-tech-900/30 text-tech-600 dark:text-tech-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-gray-900 dark:text-white">Laboratorium Canggih</h4>
                                    <p class="mt-1 text-gray-500 dark:text-gray-400">Akses penuh ke lab komputer spek tinggi, server cloud pribadi, dan perangkat IoT terbaru.</p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-gray-900 dark:text-white">Sertifikasi Internasional</h4>
                                    <p class="mt-1 text-gray-500 dark:text-gray-400">Persiapan sertifikasi industri dari vendor global seperti Cisco (CCNA), AWS, dan Oracle.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-slate-50 dark:bg-gray-800 transition-colors duration-300">
            <div class="container mx-auto px-4 max-w-screen-xl">
                <div class="text-center mb-16 reveal">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Jalur Karir Masa Depan</h2>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">Kebutuhan tenaga IT terus meningkat drastis setiap tahunnya. Berikut adalah profil lulusan kami.</p>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    <div class="reveal delay-100 bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group border border-gray-100 dark:border-gray-600">
                        <div class="w-12 h-12 bg-tech-100 dark:bg-tech-900/50 rounded-lg flex items-center justify-center mb-6 text-tech-600 dark:text-tech-300 group-hover:bg-tech-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Software Engineer</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300 leading-relaxed">Merancang dan membangun aplikasi web, mobile (Android/iOS), dan sistem backend yang robust.</p>
                    </div>

                    <div class="reveal delay-200 bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group border border-gray-100 dark:border-gray-600">
                        <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/50 rounded-lg flex items-center justify-center mb-6 text-indigo-600 dark:text-indigo-300 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">AI & Data Scientist</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300 leading-relaxed">Mengembangkan model kecerdasan buatan (Machine Learning) dan menganalisis big data.</p>
                    </div>

                    <div class="reveal delay-300 bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group border border-gray-100 dark:border-gray-600">
                        <div class="w-12 h-12 bg-red-100 dark:bg-red-900/50 rounded-lg flex items-center justify-center mb-6 text-red-600 dark:text-red-300 group-hover:bg-red-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Cyber Security</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300 leading-relaxed">Spesialis keamanan jaringan yang melindungi sistem perusahaan dari serangan siber (Ethical Hacker).</p>
                    </div>

                    <div class="reveal delay-400 bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group border border-gray-100 dark:border-gray-600">
                        <div class="w-12 h-12 bg-sky-100 dark:bg-sky-900/50 rounded-lg flex items-center justify-center mb-6 text-sky-600 dark:text-sky-300 group-hover:bg-sky-600 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Cloud Architect</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300 leading-relaxed">Merancang dan mengelola infrastruktur server berbasis awan (AWS/GCP/Azure) yang scalable.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="kurikulum" class="py-24 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-4 max-w-screen-lg">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 reveal border-b border-gray-200 dark:border-gray-700 pb-4">
                    <div>
                        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Kurikulum Unggulan</h2>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Kombinasi teori fundamental dan praktik industri terkini.</p>
                    </div>
                    <a href="#" class="hidden md:flex items-center text-tech-600 dark:text-tech-400 font-semibold hover:text-tech-800 transition">
                        Unduh Silabus Lengkap <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    </a>
                </div>

                <div class="space-y-6">
                    <div class="reveal delay-100 group flex flex-col md:flex-row items-start md:items-center p-6 bg-gray-50 dark:bg-gray-800 rounded-xl hover:bg-tech-50 dark:hover:bg-gray-700 transition-colors border border-transparent hover:border-tech-200 dark:hover:border-tech-900">
                        <div class="flex-shrink-0 w-16 h-16 bg-white dark:bg-gray-900 rounded-full flex items-center justify-center text-2xl font-bold text-tech-600 shadow-sm mb-4 md:mb-0 md:mr-6">
                            01
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-1 group-hover:text-tech-700 dark:group-hover:text-tech-300 transition-colors">Algoritma & Struktur Data Lanjut</h4>
                            <p class="text-gray-500 dark:text-gray-400">Fondasi utama untuk memecahkan masalah komputasi kompleks dengan efisiensi tinggi.</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="px-3 py-1 bg-gray-200 dark:bg-gray-700 rounded text-xs font-mono text-gray-600 dark:text-gray-300">Semester 2</span>
                        </div>
                    </div>

                    <div class="reveal delay-200 group flex flex-col md:flex-row items-start md:items-center p-6 bg-gray-50 dark:bg-gray-800 rounded-xl hover:bg-tech-50 dark:hover:bg-gray-700 transition-colors border border-transparent hover:border-tech-200 dark:hover:border-tech-900">
                        <div class="flex-shrink-0 w-16 h-16 bg-white dark:bg-gray-900 rounded-full flex items-center justify-center text-2xl font-bold text-tech-600 shadow-sm mb-4 md:mb-0 md:mr-6">
                            02
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-1 group-hover:text-tech-700 dark:group-hover:text-tech-300 transition-colors">Full Stack Web Development</h4>
                            <p class="text-gray-500 dark:text-gray-400">Pengembangan aplikasi web modern menggunakan MERN Stack (MongoDB, Express, React, Node).</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="px-3 py-1 bg-gray-200 dark:bg-gray-700 rounded text-xs font-mono text-gray-600 dark:text-gray-300">Semester 4</span>
                        </div>
                    </div>

                    <div class="reveal delay-300 group flex flex-col md:flex-row items-start md:items-center p-6 bg-gray-50 dark:bg-gray-800 rounded-xl hover:bg-tech-50 dark:hover:bg-gray-700 transition-colors border border-transparent hover:border-tech-200 dark:hover:border-tech-900">
                        <div class="flex-shrink-0 w-16 h-16 bg-white dark:bg-gray-900 rounded-full flex items-center justify-center text-2xl font-bold text-tech-600 shadow-sm mb-4 md:mb-0 md:mr-6">
                            03
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-1 group-hover:text-tech-700 dark:group-hover:text-tech-300 transition-colors">Mobile App Development</h4>
                            <p class="text-gray-500 dark:text-gray-400">Pembuatan aplikasi mobile native (Kotlin/Swift) dan hybrid (Flutter) yang responsif.</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="px-3 py-1 bg-gray-200 dark:bg-gray-700 rounded text-xs font-mono text-gray-600 dark:text-gray-300">Semester 5</span>
                        </div>
                    </div>

                    <div class="reveal delay-400 group flex flex-col md:flex-row items-start md:items-center p-6 bg-gray-50 dark:bg-gray-800 rounded-xl hover:bg-tech-50 dark:hover:bg-gray-700 transition-colors border border-transparent hover:border-tech-200 dark:hover:border-tech-900">
                        <div class="flex-shrink-0 w-16 h-16 bg-white dark:bg-gray-900 rounded-full flex items-center justify-center text-2xl font-bold text-tech-600 shadow-sm mb-4 md:mb-0 md:mr-6">
                            04
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-1 group-hover:text-tech-700 dark:group-hover:text-tech-300 transition-colors">Cloud Computing & DevOps</h4>
                            <p class="text-gray-500 dark:text-gray-400">Manajemen infrastruktur server, kontainerisasi (Docker/Kubernetes), dan CI/CD.</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="px-3 py-1 bg-gray-200 dark:bg-gray-700 rounded text-xs font-mono text-gray-600 dark:text-gray-300">Semester 6</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 relative overflow-hidden bg-gray-900 text-white text-center">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-tech-600/30 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="container mx-auto px-4 reveal relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Mulai Perjalanan Kodemu Di Sini</h2>
                <p class="mb-10 text-gray-300 max-w-2xl mx-auto text-lg">Bergabunglah dengan komunitas inovator teknologi terbesar di Kampus LSP dan bangun aplikasi yang mengubah dunia.</p>
                @if (Route::has('register'))
                    <a href="{{ route('pendaftaran.create') }}" class="inline-block bg-tech-500 text-white font-bold py-4 px-10 rounded-full hover:bg-tech-400 hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all transform hover:-translate-y-1">
                        Daftar Mahasiswa Baru
                    </a>
                @endif
            </div>
        </section>

    </main>

    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, observerOptions);

            const elementsToReveal = document.querySelectorAll('.reveal');
            elementsToReveal.forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>