<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMB - Penerimaan Mahasiswa Baru</title>

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
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 3s infinite',
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
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-400 { transition-delay: 400ms; }

        .hero-gradient {
            background: linear-gradient(to bottom, rgba(17, 24, 39, 0.3) 0%, rgba(17, 24, 39, 0.8) 100%);
        }
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
        <section class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 w-full h-full overflow-hidden z-0">
                <video autoplay muted loop playsinline class="absolute min-w-full min-h-full object-cover">
                    <source src="{{ asset('videos/Video Project.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
                <div class="absolute inset-0 hero-gradient z-10"></div>
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPjwvc3ZnPg==')] z-10 opacity-30"></div>
            </div>

            <div class="relative z-20 px-4 mx-auto max-w-screen-xl text-center">
                <div class="animate-float">
                    <span class="inline-block py-1 px-3 rounded-full bg-blue-500/20 border border-blue-400/30 text-blue-200 text-sm font-semibold mb-6 backdrop-blur-sm reveal active">
                        🚀 Penerimaan Mahasiswa Baru 2025/2026
                    </span>
                </div>
                
                <h1 class="mb-6 text-5xl font-extrabold tracking-tight leading-none text-white md:text-6xl lg:text-7xl reveal active delay-100 drop-shadow-lg">
                    Raih Masa Depan <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Gemilang Bersama Kami</span>
                </h1>
                
                <p class="mb-8 text-lg font-normal text-gray-200 lg:text-xl sm:px-16 lg:px-48 reveal active delay-200 max-w-3xl mx-auto drop-shadow-md">
                    Bergabunglah dengan komunitas akademik unggulan yang mencetak inovator masa depan. Fasilitas lengkap, kurikulum modern, dan koneksi industri luas.
                </p>
                
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 reveal active delay-300">
                    @if (Route::has('register'))
                        <a href="{{ route('pendaftaran.create') }}" class="group relative inline-flex justify-center items-center py-3.5 px-8 text-base font-bold text-white rounded-full bg-campus-600 overflow-hidden transition-all hover:shadow-[0_0_20px_rgba(37,99,235,0.6)] hover:scale-105">
                            <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-10"></span>
                            <span class="relative flex items-center gap-2">
                                Daftar Sekarang 
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                            </span>
                        </a>
                    @endif
                    <a href="#prodi" class="inline-flex justify-center items-center py-3.5 px-8 text-base font-medium text-white rounded-full border border-white/30 bg-white/10 hover:bg-white/20 backdrop-blur-sm transition-all hover:scale-105 focus:ring-4 focus:ring-gray-100">
                        Jelajahi Prodi
                    </a>
                </div>
            </div>

            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-20 animate-bounce text-white/70">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
            </div>
        </section>

        <section id="pengumuman" class="relative bg-white dark:bg-gray-900 py-20 overflow-hidden">
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-blue-400/20 rounded-full blur-3xl animate-pulse-slow dark:bg-blue-900/20 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-purple-400/20 rounded-full blur-3xl animate-pulse-slow dark:bg-purple-900/20 pointer-events-none"></div>

            <div class="relative py-8 px-4 mx-auto max-w-screen-xl z-10">
                <div class="mx-auto max-w-screen-md text-center mb-12 reveal">
                    <span class="text-campus-600 font-bold tracking-wider uppercase text-sm">Informasi Terkini</span>
                    <h2 class="mt-2 mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Pengumuman Terbaru</h2>
                    <div class="w-20 h-1 bg-campus-600 mx-auto rounded-full"></div>
                </div>

                <div class="grid gap-8 lg:grid-cols-2">
                    @php

                        $latestPengumuman = \App\Models\Pengumuman::where('status', 'aktif')
                                            ->orderBy('created_at', 'desc')
                                            ->take(2)
                                            ->get();
                    @endphp

                    @forelse($latestPengumuman as $item)
                        @php
                            $excerpt = 'Klik untuk melihat detail pengumuman.';
                            $contents = json_decode($item->deskripsi, true);
                            if (is_array($contents)) {
                                foreach ($contents as $content) {
                                    if (isset($content['type']) && $content['type'] === 'text') {
                                        $excerpt = \Illuminate\Support\Str::limit(strip_tags($content['text']), 120);
                                        break;
                                    }
                                }
                            }

                            $isEven = $loop->iteration % 2 == 0;
                            $gradientClass = $isEven ? 'from-orange-400 to-red-500 hover:from-orange-300 hover:to-red-400' : 'from-blue-500 to-purple-600 hover:from-blue-400 hover:to-purple-500';
                            $bgIconClass = $isEven ? 'bg-orange-100 dark:bg-orange-900/50 text-orange-600 dark:text-orange-300' : 'bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-300';
                            $textTitleHover = $isEven ? 'group-hover:text-orange-600 dark:group-hover:text-orange-400' : 'group-hover:text-blue-600 dark:group-hover:text-blue-400';
                            $badgeClass = $isEven ? 'text-orange-600 dark:text-orange-200 bg-orange-100 dark:bg-orange-900/50 border-orange-200 dark:border-orange-800' : 'text-blue-600 dark:text-blue-200 bg-blue-100 dark:bg-blue-900/50 border-blue-200 dark:border-blue-800';
                        @endphp

                        <div class="reveal delay-{{ $loop->iteration }}00 group relative p-1 rounded-2xl bg-gradient-to-br {{ $gradientClass }} transition-all duration-300 hover:-translate-y-2 hover:shadow-xl cursor-pointer" onclick="window.location='{{ route('pengumuman.show', $item->id) }}'">
                            <div class="h-full bg-white dark:bg-gray-800 p-6 rounded-xl relative overflow-hidden flex flex-col justify-between">
                                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity pointer-events-none">
                                    <svg class="w-24 h-24 {{ $isEven ? 'text-orange-600' : 'text-blue-600' }}" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                </div>

                                <div class="flex items-start z-10 relative">
                                    <div class="{{ $bgIconClass }} p-3 rounded-xl mr-4 shadow-sm group-hover:scale-110 transition-transform shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                                    </div>

                                    <div class="flex-grow">
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 {{ $textTitleHover }} transition-colors line-clamp-2">
                                            {{ $item->judul }}
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed line-clamp-2">
                                            {{ $excerpt }}
                                        </p>
                                        
                                        <div class="flex items-center justify-between mt-auto">
                                            <span class="text-xs font-semibold px-3 py-1 rounded-full border {{ $badgeClass }}">
                                                {{ $item->kategori ?? 'Umum' }}
                                            </span>
                                            <span class="text-xs text-gray-400 flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-span-2 text-center py-10">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-800 mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Belum ada pengumuman</h3>
                            <p class="text-gray-500 dark:text-gray-400">Silakan cek kembali nanti.</p>
                        </div>
                    @endforelse
                </div>
                
                @if($latestPengumuman->count() > 0)
                <div class="mt-10 text-center reveal">
                    <a href="{{ route('pengumuman.index') }}" class="inline-flex items-center text-campus-600 dark:text-blue-400 font-semibold hover:underline">
                        Lihat Semua Pengumuman
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
                @endif
            </div>
        </section>

        <section id="tentang" class="bg-campus-50 dark:bg-gray-800 py-24 transition-colors duration-300 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-64 h-64 bg-blue-300/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-purple-300/10 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
                    <div class="w-full lg:w-1/2 reveal delay-100">
                        <div class="relative group">
                            <div class="absolute -inset-4 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl opacity-30 blur-lg group-hover:opacity-50 transition duration-500"></div>
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white dark:border-gray-700">
                                <img src="https://images.pexels.com/photos/207691/pexels-photo-207691.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Gedung Kampus" class="w-full h-auto transform group-hover:scale-105 transition duration-700 ease-in-out">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex items-end p-6">
                                    <p class="text-white font-medium">Kampus Modern & Hijau</p>
                                </div>
                            </div>
                            <div class="absolute -bottom-6 -right-6 bg-white dark:bg-gray-800 p-4 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 flex items-center gap-3 animate-float">
                                <div class="bg-blue-100 dark:bg-blue-900/50 p-3 rounded-full text-blue-600 dark:text-blue-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Pengalaman</p>
                                    <p class="text-xl font-bold text-gray-900 dark:text-white">25+ Tahun</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2 reveal delay-200">
                        <span class="inline-block py-1 px-3 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 text-sm font-semibold mb-4">
                            Tentang Kami
                        </span>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-6 leading-tight">
                            Mewujudkan Generasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Unggul & Berkarakter</span>
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300 text-lg mb-6 leading-relaxed">
                            Kampus LSP berdiri sejak tahun 1998 dengan visi menjadi pusat pendidikan teknologi terdepan. Kami berkomitmen menyediakan lingkungan belajar yang inklusif, fasilitas modern, dan kurikulum yang relevan dengan kebutuhan industri 4.0.
                        </p>
                        <p class="text-gray-600 dark:text-gray-300 mb-8">
                            Dengan dukungan dosen praktisi dan akademisi berpengalaman, kami telah meluluskan ribuan alumni yang kini berkarya di berbagai perusahaan multinasional dan startup unicorn.
                        </p>
                        
                        <div class="grid grid-cols-2 gap-6 mb-8">
                            <div class="flex items-start">
                                <div class="mt-1 bg-green-100 dark:bg-green-900/30 p-1 rounded-full mr-3 text-green-600 dark:text-green-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 dark:text-white">Akreditasi Unggul</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Diakui secara nasional</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                 <div class="mt-1 bg-green-100 dark:bg-green-900/30 p-1 rounded-full mr-3 text-green-600 dark:text-green-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 dark:text-white">Mitra Global</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Kerjasama internasional</p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('tentang.sejarah') }}" class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3 transition-colors shadow-lg shadow-blue-500/30">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="prodi" class="bg-white dark:bg-gray-900 py-20 transition-colors duration-300">
            <div class="py-8 px-4 mx-auto max-w-screen-xl">
                <div class="text-center mb-12 reveal">
                    <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">Program Studi Unggulan</h2>
                    <p class="mt-4 text-gray-500 dark:text-gray-400">Pilih masa depanmu sesuai minat dan bakat.</p>
                </div>
                
                <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-3">
                    <div class="reveal delay-100 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                        <div class="h-48 bg-gradient-to-r from-blue-600 to-indigo-700 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/10 rounded-full"></div>
                            <div class="absolute bottom-4 left-6 text-white">
                                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <h3 class="text-2xl font-bold">Teknik Informatika</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 text-sm leading-relaxed">Mempelajari rekayasa perangkat lunak, kecerdasan buatan (AI), data science, dan pengembangan sistem keamanan siber.</p>
                            <a href="{{ route('prodi.informatika') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 font-medium group-hover:translate-x-2 transition-transform">
                                Pelajari Lebih Lanjut 
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>

                    <div class="reveal delay-200 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                        <div class="h-48 bg-gradient-to-r from-teal-500 to-emerald-600 relative overflow-hidden">
                             <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                             <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/10 rounded-full"></div>
                             <div class="absolute bottom-4 left-6 text-white">
                                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                <h3 class="text-2xl font-bold">Sistem Informasi</h3>
                             </div>
                        </div>
                        <div class="p-6">
                            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 text-sm leading-relaxed">Fokus pada integrasi teknologi dengan proses bisnis, manajemen proyek IT, dan analisis sistem enterprise.</p>
                            <a href="{{ route('prodi.sistem-informasi') }}" class="inline-flex items-center text-teal-600 hover:text-teal-800 dark:text-teal-400 font-medium group-hover:translate-x-2 transition-transform">
                                Pelajari Lebih Lanjut 
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>

                    <div class="reveal delay-300 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                        <div class="h-48 bg-gradient-to-r from-purple-600 to-pink-600 relative overflow-hidden">
                             <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                             <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/10 rounded-full"></div>
                             <div class="absolute bottom-4 left-6 text-white">
                                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                <h3 class="text-2xl font-bold">Bisnis Digital</h3>
                             </div>
                        </div>
                        <div class="p-6">
                            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 text-sm leading-relaxed">Mencetak entrepreneur muda yang siap membangun startup, digital marketing, dan e-commerce management.</p>
                            <a href="{{ route('prodi.bisnis-digital') }}" class="inline-flex items-center text-purple-600 hover:text-purple-800 dark:text-purple-400 font-medium group-hover:translate-x-2 transition-transform">
                                Pelajari Lebih Lanjut 
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
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