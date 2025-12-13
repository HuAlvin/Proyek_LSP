<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fasilitas - Kampus LSP</title>

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
        
        <section class="relative pt-32 pb-20 bg-white dark:bg-gray-800 overflow-hidden">
            <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
            <div class="relative max-w-screen-xl mx-auto px-4 text-center">
                <span class="inline-block py-1 px-3 rounded-full bg-blue-50 text-campus-600 text-xs font-bold tracking-widest mb-4 border border-blue-100 dark:bg-blue-900/30 dark:text-blue-300 dark:border-blue-800">
                    SARANA & PRASARANA
                </span>
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl">
                    Fasilitas Kampus
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-400">
                    Kami menyediakan lingkungan belajar modern dan nyaman untuk mendukung kreativitas serta inovasi mahasiswa.
                </p>
            </div>
        </section>

        <section class="py-16 px-4">
            <div class="max-w-screen-xl mx-auto">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <a href="{{ route('fasilitas.lab_komputer') }}" class="group bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700 block cursor-pointer">
                        <div class="relative h-56 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" 
                                 src="{{ asset('images/lab.webp') }}" 
                                 alt="Lab Komputer">
                            
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>

                            <div class="absolute top-4 right-4 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm p-2 rounded-lg shadow-sm group-hover:bg-campus-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-6 h-6 text-campus-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-campus-600 transition-colors flex items-center justify-between">
                                Laboratorium Komputer
                                <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Dilengkapi dengan PC spesifikasi tinggi (i7, 16GB RAM, RTX 3060) untuk keperluan praktikum pemrograman, desain grafis, dan multimedia.
                            </p>
                        </div>
                    </a>

                    <a href="{{ route('fasilitas.library') }}" class="group bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700 block cursor-pointer">
                        <div class="relative h-56 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" 
                                 src="{{ asset('images/library.webp') }}" 
                                 alt="Perpustakaan">
                            
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>

                            <div class="absolute top-4 right-4 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm p-2 rounded-lg shadow-sm group-hover:bg-campus-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-6 h-6 text-campus-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-campus-600 transition-colors flex items-center justify-between">
                                Perpustakaan Digital
                                <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Akses ke ribuan koleksi buku fisik dan e-book internasional, serta area baca yang tenang dan nyaman dengan koneksi internet cepat.
                            </p>
                        </div>
                    </a>

                    <a href="{{ route('fasilitas.smart_classroom') }}" class="group bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700 block cursor-pointer">
                        <div class="relative h-56 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" 
                                 src="https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=600&auto=format&fit=crop" 
                                 alt="Kelas">
                            
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>

                            <div class="absolute top-4 right-4 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm p-2 rounded-lg shadow-sm group-hover:bg-campus-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-6 h-6 text-campus-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-campus-600 transition-colors flex items-center justify-between">
                                Smart Classroom
                                <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Ruang kelas ber-AC yang dilengkapi dengan Proyektor Smart, Sound System, dan kursi ergonomis untuk menunjang kenyamanan belajar.
                            </p>
                        </div>
                    </a>

                    <a href="{{ route('fasilitas.auditorium') }}" class="group bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700 block cursor-pointer">
                        <div class="relative h-56 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" 
                                 src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?q=80&w=600&auto=format&fit=crop" 
                                 alt="Auditorium">
                            
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>

                            <div class="absolute top-4 right-4 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm p-2 rounded-lg shadow-sm group-hover:bg-campus-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-6 h-6 text-campus-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-campus-600 transition-colors flex items-center justify-between">
                                Auditorium Serbaguna
                                <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Kapasitas 500 orang untuk kegiatan seminar nasional, wisuda, dan acara kemahasiswaan besar lainnya.
                            </p>
                        </div>
                    </a>

                    <a href="{{ route('fasilitas.coworking_space') }}" class="group bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700 block cursor-pointer">
                        <div class="relative h-56 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" 
                                 src="https://images.unsplash.com/photo-1527192491265-7e15c55b1ed2?q=80&w=600&auto=format&fit=crop" 
                                 alt="Coworking">
                            
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>

                            <div class="absolute top-4 right-4 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm p-2 rounded-lg shadow-sm group-hover:bg-campus-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-6 h-6 text-campus-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-campus-600 transition-colors flex items-center justify-between">
                                Student Coworking Space
                                <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Area terbuka yang didesain kreatif untuk diskusi kelompok, mengerjakan tugas, atau sekadar bersantai dengan Wi-Fi gratis.
                            </p>
                        </div>
                    </a>

                    <a href="{{ route('fasilitas.ibadah') }}" class="group bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700 block cursor-pointer">
                        <div class="relative h-56 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" 
                                 src="{{ asset('images/tempatibadah.webp') }}" 
                                 alt="Masjid">
                            
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>

                            <div class="absolute top-4 right-4 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm p-2 rounded-lg shadow-sm group-hover:bg-campus-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-6 h-6 text-campus-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-campus-600 transition-colors flex items-center justify-between">
                                Pusat Ibadah
                                <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Sarana ibadah multi-agama yang luas, bersih, dan nyaman untuk mendukung kegiatan keagamaan seluruh civitas akademika.
                            </p>
                        </div>
                    </a>

                </div>

            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>