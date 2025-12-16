<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terbitkan Bukti Penerimaan - Admin Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: { colors: { campus: { 600: '#2563eb', 800: '#1e40af' } } }
            }
        }
    </script>
    
    <style>
        /* Custom Select Style */
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        .dark .custom-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        }
    </style>

    <script>
        // Dark Mode Logic
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

            <header class="flex h-16 items-center justify-between border-b border-gray-200 bg-white px-6 dark:bg-gray-800 dark:border-gray-700">
                <button onclick="toggleSidebar()" class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <h1 class="text-xl font-bold text-gray-800 dark:text-white">Terbitkan Bukti Penerimaan</h1>

                <div class="flex items-center gap-4">
                    {{-- Tombol Theme --}}
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
                            <img class="h-8 w-8 rounded-full object-cover border border-gray-300 dark:border-gray-500"
                                src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('images/user.png') }}"
                                alt="Avatar">
                            <span class="hidden text-sm font-medium text-gray-700 dark:text-gray-200 md:block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="admin-user-dropdown" class="absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-800 dark:ring-gray-700 hidden z-50 divide-y divide-gray-100 dark:divide-gray-700">
                            <div class="px-4 py-3">
                                <p class="text-sm text-gray-900 dark:text-white font-bold">{{ Auth::user()->name }}</p>
                                <p class="text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</p>
                            </div>
                            <ul class="py-1">
                                <li><a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">Dashboard</a></li>
                                <li><a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">Profile Settings</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 font-semibold">Log Out</button></form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6">
                <div class="max-w-4xl mx-auto">
                    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700">

                        <div class="bg-campus-600 px-6 py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center">
                            <div>
                                <h2 class="text-white text-lg font-semibold">Penerima: {{ $pendaftar->name }}</h2>
                                <p class="text-blue-100 text-sm">Prodi: {{ $pendaftar->prodi }}</p>
                            </div>
                        </div>

                        <form action="{{ route('admin.pendaftar.store_receipt', $pendaftar->id) }}" method="POST" class="p-8 space-y-8">
                            @csrf

                            {{-- BARIS 1: Nominal & Tanggal --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-sm font-bold mb-2 text-gray-700 dark:text-gray-300">Nominal Diterima</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span class="text-gray-500 dark:text-gray-400 font-bold">Rp</span>
                                        </div>
                                        <input type="text" value="{{ number_format($pendaftar->pembayaran->jumlah_bayar ?? 0, 0, ',', '.') }}" readonly class="pl-12 block w-full rounded-lg border-gray-300 bg-gray-100 text-gray-600 cursor-not-allowed dark:bg-gray-700/50 dark:border-gray-600 dark:text-gray-400 font-bold sm:text-sm py-3 shadow-sm focus:ring-0 focus:border-gray-300">
                                        <input type="hidden" name="nominal" value="{{ $pendaftar->pembayaran->jumlah_bayar ?? 0 }}">
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">*Sesuai data pembayaran user.</p>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold mb-2 text-gray-700 dark:text-gray-300">Tanggal Terima</label>
                                    <input type="date" name="tanggal_terima" value="{{ old('tanggal_terima', date('Y-m-d')) }}" class="block w-full rounded-lg border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-campus-600 focus:border-campus-600 sm:text-sm py-3 px-4 shadow-sm">
                                    @error('tanggal_terima') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- BARIS 2: Kode Verifikasi (Visual) & Admin Signer --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                
                                {{-- KOLOM BARU: Kode Verifikasi Otomatis --}}
                                <div>
                                    <label class="block text-sm font-bold mb-2 text-gray-700 dark:text-gray-300">Kode Verifikasi (Auto)</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </div>
                                        <input type="text" value="Dibuat Otomatis oleh Sistem" readonly class="pl-12 block w-full rounded-lg border-gray-300 bg-gray-100 text-gray-500 italic cursor-not-allowed dark:bg-gray-700/50 dark:border-gray-600 dark:text-gray-400 sm:text-sm py-3 shadow-sm">
                                    </div>
                                    <p class="text-xs text-blue-600 dark:text-blue-400 mt-1">*Kode unik pendek akan digenerate saat Anda klik tombol Terbitkan.</p>
                                </div>

                                {{-- KOLOM ADMIN --}}
                                <div>
                                    <label class="block text-sm font-bold mb-2 text-gray-700 dark:text-gray-300">Admin Verifikator (Anda)</label>

                                    @php
                                        $hasSignature = \App\Models\AdminSignature::where('user_id', Auth::id())->exists();
                                    @endphp

                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" value="{{ Auth::user()->name }}" readonly class="pl-12 block w-full rounded-lg border-gray-300 bg-gray-100 text-gray-600 cursor-not-allowed dark:bg-gray-700/50 dark:border-gray-600 dark:text-gray-400 font-bold sm:text-sm py-3 shadow-sm focus:ring-0">
                                        <input type="hidden" name="admin_name" value="{{ Auth::user()->name }}">
                                    </div>

                                    @if($hasSignature)
                                        <p class="text-xs text-green-600 mt-2 flex items-center gap-1 font-semibold">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Tanda tangan digital Anda tersedia.
                                        </p>
                                    @else
                                        <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg text-red-600 text-xs">
                                            <strong>PERHATIAN:</strong> Anda belum mengatur tanda tangan digital RSA.
                                            <br>
                                            Silakan <a href="{{ route('admin.signatures.index') }}" class="underline font-bold hover:text-red-800">Upload Signature Disini</a> terlebih dahulu.
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- BARIS 3: Keterangan --}}
                            <div>
                                <label class="block text-sm font-bold mb-2 text-gray-700 dark:text-gray-300">Keterangan / Perihal</label>
                                <textarea name="keterangan" rows="3" placeholder="Contoh: Pembayaran Lunas Biaya Pendaftaran Gelombang 1" class="block w-full rounded-lg border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 focus:ring-campus-600 focus:border-campus-600 sm:text-sm p-4 shadow-sm"></textarea>
                            </div>

                            <div class="pt-6 border-t border-gray-100 dark:border-gray-700 flex items-center justify-end gap-3">
                                <a href="{{ route('admin.pendaftar') }}" class="px-5 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-600 transition-colors">Batal</a>

                                @if($hasSignature)
                                    <button type="submit" class="px-5 py-2.5 bg-campus-600 border border-transparent rounded-lg text-sm font-medium text-white hover:bg-campus-800 focus:ring-2 focus:ring-offset-2 focus:ring-campus-600 transition shadow-lg flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Terbitkan Kwitansi
                                    </button>
                                @else
                                    <button type="button" disabled class="px-5 py-2.5 bg-gray-300 border border-transparent rounded-lg text-sm font-medium text-gray-500 cursor-not-allowed flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                        Signature Belum Ada
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- Script JavaScript --}}
    <script>
        function toggleSidebar() { document.getElementById('sidebar')?.classList.toggle('-translate-x-full'); }
        function toggleAdminUserDropdown() { document.getElementById('admin-user-dropdown').classList.toggle('hidden'); }

        const themeToggleBtn = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            lightIcon.classList.remove('hidden');
        } else {
            darkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function () {
            darkIcon.classList.toggle('hidden');
            lightIcon.classList.toggle('hidden');
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

        window.onclick = function (event) {
            if (!event.target.closest('#admin-user-menu-button')) {
                var dropdowns = document.getElementsByClassName("origin-top-right");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('hidden')) {
                        openDropdown.classList.add('hidden');
                    }
                }
            }
        }
    </script>
</body>
</html>