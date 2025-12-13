<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S1 Sistem Informasi - Kampus LSP</title>

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
                        sys: {
                            50: '#f0fdfa', 100: '#ccfbf1', 500: '#14b8a6', 600: '#0d9488', 700: '#0f766e', 800: '#115e59', 900: '#134e4a',
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-reverse': 'floatReverse 7s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        floatReverse: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(15px)' },
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
        .delay-400 { transition-delay: 400ms; }
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
        <section class="relative h-[550px] flex items-center justify-center overflow-hidden bg-sys-900">
            <div class="absolute inset-0 opacity-10">
                <svg width="100%" height="100%" fill="none">
                    <pattern id="hexagons" x="0" y="0" width="50" height="86" patternUnits="userSpaceOnUse" patternTransform="scale(0.5)">
                        <path d="M25 0 L50 14 L50 43 L25 57 L0 43 L0 14 Z" fill="currentColor" class="text-white"/>
                    </pattern>
                    <rect x="0" y="0" width="100%" height="100%" fill="url(#hexagons)"/>
                </svg>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-sys-900 via-transparent to-transparent"></div>

            <div class="absolute top-1/4 left-10 md:left-1/4 animate-float opacity-30 text-sys-300">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <div class="absolute bottom-1/4 right-10 md:right-1/4 animate-float-reverse opacity-30 text-teal-300">
                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            </div>
            
            <div class="relative z-20 px-4 mx-auto max-w-screen-xl text-center">
                <span class="inline-flex items-center py-1 px-4 rounded-full bg-teal-500/20 border border-teal-400/30 text-teal-200 text-sm font-semibold mb-6 backdrop-blur-md reveal active">
                    The Bridge Between Tech & Business
                </span>
                
                <h1 class="mb-6 text-5xl font-extrabold tracking-tight leading-none text-white md:text-6xl lg:text-7xl drop-shadow-lg reveal active delay-100">
                    Sistem <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-emerald-400">Informasi</span>
                </h1>
                
                <p class="mb-10 text-lg font-light text-gray-200 lg:text-xl sm:px-16 lg:px-48 reveal active delay-200 max-w-4xl mx-auto">
                    Ahli dalam menganalisis kebutuhan bisnis dan menerjemahkannya ke dalam solusi teknologi yang efisien, efektif, dan strategis.
                </p>
                
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 reveal active delay-300">
                    @if (Route::has('register'))
                        <a href="{{ route('pendaftaran.create') }}" class="inline-flex justify-center items-center py-3.5 px-8 text-base font-bold text-white rounded-lg bg-sys-600 hover:bg-sys-500 transition-all hover:scale-105 shadow-[0_0_20px_rgba(20,184,166,0.4)]">
                            Daftar Sekarang
                        </a>
                    @endif
                    
                    <a href="#prospek" class="inline-flex justify-center items-center py-3.5 px-8 text-base font-medium text-center text-white rounded-lg border border-sys-400/50 hover:bg-sys-800/50 backdrop-blur-sm transition-all focus:ring-4 focus:ring-sys-800">
                        Peluang Karir
                    </a>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-4 max-w-screen-xl">
                <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
                    <div class="w-full lg:w-1/2 reveal">
                        <div class="relative group">
                            <div class="absolute -inset-4 bg-gradient-to-l from-sys-500 to-emerald-600 rounded-2xl opacity-30 blur-lg group-hover:opacity-50 transition duration-500"></div>
                            
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                                <img src="{{ asset('images/sisteminformasi.jpg') }}" 
                                     alt="Analisis Sistem" 
                                     class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-700"
                                     onerror="this.src='https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'">

                                <div class="absolute top-6 left-6 bg-white/90 dark:bg-gray-800/90 backdrop-blur p-4 rounded-lg shadow-lg border-l-4 border-sys-500 animate-float-reverse">
                                    <p class="text-sm font-bold text-gray-800 dark:text-white">Business Intelligence</p>
                                    <p class="text-xs text-sys-600 dark:text-sys-400">Data Driven Decision</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2 reveal delay-100">
                        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6 leading-tight">
                            Bukan Sekadar Coding, Ini Tentang <span class="text-sys-600">Solusi Perusahaan</span>
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-6 text-lg leading-relaxed">
                            Di Prodi Sistem Informasi, Anda berdiri di tengah-tengah dua dunia: **Teknologi** dan **Manajemen**. Anda tidak hanya belajar cara membuat aplikasi, tetapi *mengapa* aplikasi itu dibuat, bagaimana dampaknya terhadap keuntungan perusahaan, dan bagaimana mengelola proyek IT skala besar.
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                            <div class="flex items-start">
                                <div class="mt-1 bg-sys-100 dark:bg-sys-900/30 p-2 rounded-lg text-sys-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="font-bold text-gray-900 dark:text-white">IT Governance</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Tata kelola audit sistem.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="mt-1 bg-sys-100 dark:bg-sys-900/30 p-2 rounded-lg text-sys-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="font-bold text-gray-900 dark:text-white">ERP Systems</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Integrasi proses bisnis (SAP/Odoo).</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="mt-1 bg-sys-100 dark:bg-sys-900/30 p-2 rounded-lg text-sys-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="font-bold text-gray-900 dark:text-white">Project Mgmt</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Memimpin tim developer.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="mt-1 bg-sys-100 dark:bg-sys-900/30 p-2 rounded-lg text-sys-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="font-bold text-gray-900 dark:text-white">Database</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Perancangan data skala besar.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-sys-800 py-12 border-y border-sys-700 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(0deg, transparent 24%, #ffffff 25%, #ffffff 26%, transparent 27%, transparent 74%, #ffffff 75%, #ffffff 76%, transparent 77%, transparent), linear-gradient(90deg, transparent 24%, #ffffff 25%, #ffffff 26%, transparent 27%, transparent 74%, #ffffff 75%, #ffffff 76%, transparent 77%, transparent); background-size: 50px 50px;"></div>
            
            <div class="container mx-auto px-4 relative z-10">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div class="reveal delay-100">
                        <span class="block text-4xl font-extrabold text-white mb-1">92%</span>
                        <span class="text-sys-200 text-sm">Lulusan Bekerja < 6 Bulan</span>
                    </div>
                    <div class="reveal delay-200">
                        <span class="block text-4xl font-extrabold text-white mb-1">20+</span>
                        <span class="text-sys-200 text-sm">Mitra Perusahaan</span>
                    </div>
                    <div class="reveal delay-300">
                        <span class="block text-4xl font-extrabold text-white mb-1">3</span>
                        <span class="text-sys-200 text-sm">Sertifikasi Kompetensi</span>
                    </div>
                    <div class="reveal delay-400">
                        <span class="block text-4xl font-extrabold text-white mb-1">A</span>
                        <span class="text-sys-200 text-sm">Akreditasi BAN-PT</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="prospek" class="py-24 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
            <div class="container mx-auto px-4 max-w-screen-xl">
                <div class="text-center mb-16 reveal">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Prospek Karir Lulusan</h2>
                    <p class="mt-4 text-gray-500 dark:text-gray-400">Posisi strategis yang menghubungkan kebutuhan user dengan tim teknis.</p>
                </div>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <div class="reveal delay-100 bg-white dark:bg-gray-700 p-8 rounded-xl shadow-sm border-t-4 border-sys-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center mb-4">
                            <div class="p-3 bg-sys-100 dark:bg-sys-900/50 rounded-lg text-sys-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-gray-900 dark:text-white">System Analyst</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Menganalisis sistem yang ada, mengidentifikasi masalah, dan merancang solusi sistem informasi baru yang lebih efisien.</p>
                    </div>

                    <div class="reveal delay-200 bg-white dark:bg-gray-700 p-8 rounded-xl shadow-sm border-t-4 border-emerald-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center mb-4">
                            <div class="p-3 bg-emerald-100 dark:bg-emerald-900/50 rounded-lg text-emerald-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-gray-900 dark:text-white">Database Administrator</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Bertanggung jawab atas kinerja, integritas, dan keamanan database perusahaan. Memastikan data selalu tersedia.</p>
                    </div>

                    <div class="reveal delay-300 bg-white dark:bg-gray-700 p-8 rounded-xl shadow-sm border-t-4 border-blue-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center mb-4">
                            <div class="p-3 bg-blue-100 dark:bg-blue-900/50 rounded-lg text-blue-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-gray-900 dark:text-white">IT Consultant</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Memberikan saran strategis kepada klien tentang bagaimana menggunakan teknologi informasi untuk mencapai tujuan bisnis.</p>
                    </div>

                    <div class="reveal delay-400 bg-white dark:bg-gray-700 p-8 rounded-xl shadow-sm border-t-4 border-teal-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center mb-4">
                            <div class="p-3 bg-teal-100 dark:bg-teal-900/50 rounded-lg text-teal-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-gray-900 dark:text-white">IT Project Manager</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Merencanakan, mengeksekusi, dan menutup proyek IT. Mengelola tim, budget, dan timeline agar proyek sukses.</p>
                    </div>

                    <div class="reveal delay-500 bg-white dark:bg-gray-700 p-8 rounded-xl shadow-sm border-t-4 border-indigo-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center mb-4">
                            <div class="p-3 bg-indigo-100 dark:bg-indigo-900/50 rounded-lg text-indigo-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-gray-900 dark:text-white">ERP Specialist</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Mengimplementasikan dan memelihara sistem ERP (Enterprise Resource Planning) yang mengintegrasikan seluruh fungsi bisnis.</p>
                    </div>

                    <div class="reveal delay-600 bg-white dark:bg-gray-700 p-8 rounded-xl shadow-sm border-t-4 border-purple-500 hover:shadow-lg transition-shadow">
                        <div class="flex items-center mb-4">
                            <div class="p-3 bg-purple-100 dark:bg-purple-900/50 rounded-lg text-purple-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-gray-900 dark:text-white">IS Auditor</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Memeriksa sistem informasi perusahaan untuk memastikan keamanan, efisiensi data, dan kepatuhan terhadap regulasi.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 relative bg-gradient-to-br from-sys-700 to-teal-900 text-white text-center">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
            <div class="container mx-auto px-4 reveal relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Jadilah Arsitek Sistem Bisnis Masa Depan</h2>
                <p class="mb-10 text-sys-100 max-w-2xl mx-auto text-lg">Dunia membutuhkan profesional yang paham bahasa bisnis sekaligus bahasa teknologi. Itu adalah Kamu.</p>
                @if (Route::has('register'))
                    <a href="{{ route('pendaftaran.create') }}" class="inline-block bg-white text-sys-800 font-bold py-4 px-10 rounded-full hover:bg-gray-100 hover:scale-105 transition-all shadow-xl">
                        Daftar Sekarang
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