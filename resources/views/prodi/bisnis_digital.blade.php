<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S1 Bisnis Digital - Kampus LSP</title>

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
                        biz: {
                            50: '#fdf4ff', 100: '#fae8ff', 500: '#d946ef', 600: '#c026d3', 700: '#a21caf', 900: '#701a75',
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
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
        <section class="relative h-[500px] flex items-center justify-center overflow-hidden bg-gradient-to-br from-purple-900 via-biz-900 to-blue-900">
            <div class="absolute inset-0 opacity-20">
                <svg class="h-full w-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <path d="M0 100 C 20 0 50 0 100 100 Z" fill="url(#grad1)" />
                    <defs>
                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:rgb(255,0,255);stop-opacity:1" />
                            <stop offset="100%" style="stop-color:rgb(0,0,255);stop-opacity:1" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            
            <div class="relative z-20 px-4 mx-auto max-w-screen-xl text-center">
                <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-white text-sm font-semibold mb-4 backdrop-blur-sm animate-float">
                    Program Sarjana (S1)
                </span>
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl drop-shadow-lg reveal active">
                    Bisnis Digital
                </h1>
                <p class="mb-8 text-lg font-light text-gray-200 lg:text-xl sm:px-16 lg:px-48 reveal active delay-100">
                    Mencetak <span class="font-bold text-biz-500">Technopreneur</span> dan pemimpin masa depan yang mampu mengintegrasikan teknologi, manajemen, dan strategi bisnis di era ekonomi digital.
                </p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 reveal active delay-200">
                    @if (Route::has('register'))
                        <a href="{{ route('pendaftaran.create') }}" class="inline-flex justify-center items-center py-3 px-8 text-base font-bold text-center text-white rounded-full bg-biz-600 hover:bg-biz-700 focus:ring-4 focus:ring-biz-300 transition-all hover:scale-105 shadow-lg shadow-biz-500/30">
                            Daftar Sekarang
                        </a>
                    @endif

                    <a href="#kurikulum" class="inline-flex justify-center items-center py-3 px-8 text-base font-medium text-center text-white rounded-full border border-white/30 hover:bg-white/10 focus:ring-4 focus:ring-gray-100 transition-all">
                        Lihat Kurikulum
                    </a>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-4 max-w-screen-xl">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="w-full lg:w-1/2 reveal">
                        <div class="relative">
                            <div class="absolute -inset-4 bg-gradient-to-r from-biz-500 to-purple-600 rounded-2xl opacity-30 blur-lg"></div>
                            <img src="{{ asset('images/bisnisdigital.webp') }}" 
                                 alt="Meeting Bisnis Digital" 
                                 class="relative rounded-2xl shadow-2xl border-4 border-white dark:border-gray-700 w-full object-cover h-80 lg:h-96"
                                 onerror="this.src='https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'">
                            
                            <div class="absolute -bottom-6 -right-6 bg-white dark:bg-gray-800 p-4 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 flex items-center gap-3 animate-float">
                                <div class="bg-biz-100 dark:bg-biz-900/50 p-3 rounded-full text-biz-600 dark:text-biz-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Pertumbuhan</p>
                                    <p class="text-lg font-bold text-gray-900 dark:text-white">High Demand</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 reveal delay-100">
                        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6">Kenapa Memilih <span class="text-biz-600">Bisnis Digital?</span></h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-6 text-lg leading-relaxed">
                            Program Studi Bisnis Digital dirancang untuk menjawab tantangan revolusi industri 4.0. Anda tidak hanya belajar teori ekonomi klasik, tetapi juga bagaimana menerapkannya menggunakan teknologi terkini seperti Big Data, AI, dan E-Commerce.
                        </p>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mt-1 mr-3">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-gray-700 dark:text-gray-300">Kurikulum berbasis praktik dan proyek nyata (Project Based Learning).</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mt-1 mr-3">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-gray-700 dark:text-gray-300">Dukungan Inkubator Bisnis untuk merintis Startup sejak kuliah.</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mt-1 mr-3">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-gray-700 dark:text-gray-300">Sertifikasi kompetensi Digital Marketing Internasional.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-biz-50 dark:bg-gray-800 transition-colors duration-300">
            <div class="container mx-auto px-4 max-w-screen-xl">
                <div class="text-center mb-16 reveal">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Prospek Karir</h2>
                    <p class="mt-4 text-gray-500 dark:text-gray-400">Lulusan kami siap mengisi posisi strategis di perusahaan global.</p>
                </div>

                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                    <div class="reveal delay-100 bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md hover:-translate-y-2 transition-transform duration-300 border-t-4 border-biz-500">
                        <div class="w-14 h-14 bg-biz-100 dark:bg-biz-900/50 rounded-lg flex items-center justify-center mb-4 text-biz-600 dark:text-biz-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Business Analyst</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Menganalisis data bisnis untuk membantu perusahaan mengambil keputusan strategis berbasis data.</p>
                    </div>

                    <div class="reveal delay-200 bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md hover:-translate-y-2 transition-transform duration-300 border-t-4 border-blue-500">
                        <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/50 rounded-lg flex items-center justify-center mb-4 text-blue-600 dark:text-blue-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Digital Marketer</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Merancang strategi pemasaran online, SEO, SEM, dan manajemen media sosial.</p>
                    </div>

                    <div class="reveal delay-300 bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md hover:-translate-y-2 transition-transform duration-300 border-t-4 border-purple-500">
                        <div class="w-14 h-14 bg-purple-100 dark:bg-purple-900/50 rounded-lg flex items-center justify-center mb-4 text-purple-600 dark:text-purple-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Startup Founder</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Membangun dan mengembangkan perusahaan rintisan teknologi sendiri (Technopreneur).</p>
                    </div>

                    <div class="reveal delay-400 bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md hover:-translate-y-2 transition-transform duration-300 border-t-4 border-green-500">
                        <div class="w-14 h-14 bg-green-100 dark:bg-green-900/50 rounded-lg flex items-center justify-center mb-4 text-green-600 dark:text-green-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Fintech Specialist</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Ahli dalam teknologi keuangan modern, pembayaran digital, dan blockchain.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="kurikulum" class="py-20 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-4 max-w-screen-md">
                <div class="text-center mb-12 reveal">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Mata Kuliah Unggulan</h2>
                    <div class="w-20 h-1 bg-biz-500 mx-auto rounded-full mt-4"></div>
                </div>

                <div class="space-y-4">
                    <div class="reveal delay-100 flex items-center p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-100 dark:border-gray-700">
                        <span class="font-bold text-biz-600 mr-4 text-xl">01</span>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white">E-Commerce Strategy & Management</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Strategi mengelola toko online dan marketplace.</p>
                        </div>
                    </div>
                    <div class="reveal delay-200 flex items-center p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-100 dark:border-gray-700">
                        <span class="font-bold text-biz-600 mr-4 text-xl">02</span>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white">Big Data Analytics for Business</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Pengolahan data besar untuk insight bisnis.</p>
                        </div>
                    </div>
                    <div class="reveal delay-300 flex items-center p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-100 dark:border-gray-700">
                        <span class="font-bold text-biz-600 mr-4 text-xl">03</span>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white">UI/UX Design for Business</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Desain antarmuka produk digital yang user-friendly.</p>
                        </div>
                    </div>
                    <div class="reveal delay-400 flex items-center p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-100 dark:border-gray-700">
                        <span class="font-bold text-biz-600 mr-4 text-xl">04</span>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white">Digital Law & Ethics</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Hukum siber dan etika bisnis di dunia maya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gradient-to-r from-biz-600 to-purple-600 text-white text-center">
            <div class="container mx-auto px-4 reveal">
                <h2 class="text-3xl font-bold mb-4">Siap Menjadi Leader di Era Digital?</h2>
                <p class="mb-8 text-white/80 max-w-2xl mx-auto">Bergabunglah dengan ribuan mahasiswa lainnya yang telah memilih masa depan cerah bersama Kampus LSP.</p>
                @if (Route::has('register'))
                    <a href="{{ route('pendaftaran.create') }}" class="inline-block bg-white text-biz-600 font-bold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors shadow-lg">
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