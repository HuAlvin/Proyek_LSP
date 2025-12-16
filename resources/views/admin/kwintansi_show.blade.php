<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Transaksi - {{ $receipt->no_referensi }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: { extend: { colors: { campus: { 600: '#2563eb', 800: '#1e40af' } } } }
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
<body class="bg-gray-50 dark:bg-gray-900 font-sans antialiased transition-colors duration-300">

    <div class="flex h-screen overflow-hidden">
        @include('layouts.navbar_admin')

        <div class="flex h-full flex-1 flex-col overflow-y-auto">
            
            {{-- HEADER PERBAIKAN (Ditambah shrink-0 agar tidak mengecil) --}}
            <header class="flex h-16 shrink-0 items-center justify-between border-b border-gray-200 bg-white px-6 dark:bg-gray-800 dark:border-gray-700">
                
                {{-- Kiri: Sidebar Toggle, Judul, & Tombol Kembali --}}
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
                        <h1 class="text-xl font-bold text-gray-800 dark:text-white">Detail Transaksi</h1>
                    </div>
                </div>

                {{-- Kanan: Dark Mode & User Profile (Sama persis dengan data_pendaftar) --}}
                <div class="flex items-center gap-4">
                    
                    {{-- Theme Toggle --}}
                    <button id="theme-toggle" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        <svg id="theme-toggle-dark-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <div class="h-8 w-px bg-gray-300 dark:bg-gray-600 hidden md:block"></div>

                    {{-- Admin Dropdown --}}
                    <div class="relative ml-2">
                        <button onclick="toggleAdminUserDropdown()" id="admin-user-menu-button" class="flex items-center gap-2 rounded-full bg-gray-100 p-1 pr-3 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600 transition-all">
                            <img class="h-8 w-8 rounded-full object-cover border border-gray-300 dark:border-gray-500" src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('images/user.png') }}" alt="Avatar">
                            <span class="hidden text-sm font-medium text-gray-700 dark:text-gray-200 md:block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div id="admin-user-dropdown" class="absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-800 dark:ring-gray-700 hidden z-50 divide-y divide-gray-100 dark:divide-gray-700">
                            <div class="px-4 py-3">
                                <p class="text-sm text-gray-900 dark:text-white font-bold">{{ Auth::user()->name }}</p>
                                <p class="text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</p>
                            </div>
                            <ul class="py-1">
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">Profile Settings</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 font-semibold">Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6">
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    
                    <div class="space-y-6">
                        <div class="bg-white dark:bg-gray-800 shadow rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Biodata Pendaftar</h3>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">Nama Lengkap</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $receipt->pendaftar->name }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">NIK</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $receipt->pendaftar->nik ?? '-' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">Email Akun</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $receipt->pendaftar->user->email ?? '-' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">Nomor HP/WA</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $receipt->pendaftar->phone ?? '-' }}</p>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">Program Studi Pilihan</p>
                                        <span class="inline-flex mt-1 items-center rounded-md bg-blue-50 px-2 py-1 text-sm font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10 dark:bg-blue-900/30 dark:text-blue-300">
                                            {{ $receipt->pendaftar->prodi }}
                                        </span>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">Alamat</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $receipt->pendaftar->alamat ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 shadow rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50 flex justify-between items-center">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Rincian Transaksi</h3>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">LUNAS</span>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-100 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">No. Referensi Kwitansi</span>
                                    <span class="font-mono font-bold text-campus-600 dark:text-blue-400">{{ $receipt->no_referensi }}</span>
                                </div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-600 dark:text-gray-400">Tanggal Terima</span>
                                    <span class="font-medium text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($receipt->tanggal_terima)->translatedFormat('d F Y') }}</span>
                                </div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-600 dark:text-gray-400">Admin Verifikator</span>
                                    <span class="font-medium text-gray-900 dark:text-white">{{ $receipt->admin_name }}</span>
                                </div>
                                <div class="mt-4 pt-4 border-t border-dashed border-gray-300 dark:border-gray-600 flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-800 dark:text-white">Total Nominal</span>
                                    <span class="text-2xl font-bold text-campus-600 dark:text-blue-400">Rp {{ number_format($receipt->nominal, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        
                        <div class="bg-white dark:bg-gray-800 shadow rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Bukti Transfer (Dari User)</h3>
                            </div>
                            <div class="p-4 bg-gray-100 dark:bg-gray-900 flex justify-center items-center">
                                @if($receipt->pendaftar->pembayaran && $receipt->pendaftar->pembayaran->gambar)
                                    <img src="{{ asset('storage/' . $receipt->pendaftar->pembayaran->gambar) }}" 
                                         class="max-h-64 object-contain rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 hover:scale-105 transition-transform duration-300 cursor-pointer" 
                                         onclick="window.open(this.src)"
                                         alt="Bukti Transfer">
                                @else
                                    <div class="text-center py-10 text-gray-500">Tidak ada gambar bukti transfer.</div>
                                @endif
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 shadow rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 h-[600px] flex flex-col">
                            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50 flex justify-between items-center">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Dokumen Kwitansi Resmi</h3>
                                <a href="{{ route('admin.receipts.print', $receipt->id) }}" target="_blank" class="text-sm text-blue-600 hover:underline dark:text-blue-400">
                                    Buka Full Screen
                                </a>
                            </div>
                            <div class="flex-1 bg-gray-200 dark:bg-gray-900">
                                <iframe src="{{ route('admin.receipts.print', $receipt->id) }}" class="w-full h-full" frameborder="0"></iframe>
                            </div>
                        </div>

                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() { document.getElementById('sidebar')?.classList.toggle('-translate-x-full'); }

        // --- SCRIPT TAMBAHAN UNTUK HEADER (Agar Dark Mode & Dropdown Berfungsi) ---
        // Ini wajib ada karena header baru menggunakan fitur dropdown & dark mode
        
        function toggleAdminUserDropdown() { document.getElementById('admin-user-dropdown').classList.toggle('hidden'); }

        // Tutup dropdown jika klik di luar
        window.onclick = function(event) {
            if (!event.target.closest('#admin-user-menu-button')) {
                const dropdown = document.getElementById('admin-user-dropdown');
                if (dropdown && !dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        }

        // --- DARK MODE LOGIC (Sama dengan data_pendaftar) ---
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Set icon awal
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');
        if(themeToggleBtn){
            themeToggleBtn.addEventListener('click', function() {
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
            });
        }
    </script>
</body>
</html>