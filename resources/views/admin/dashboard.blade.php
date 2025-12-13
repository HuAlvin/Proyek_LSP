<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Admin Panel</title>

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
        // Cek preferensi dark mode saat load
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 font-sans antialiased transition-colors duration-300">

    <div class="flex h-screen overflow-hidden">

        {{-- Pastikan file ini ada di resources/views/layouts/navbar_admin.blade.php --}}
        @include('layouts.navbar_admin')

        <div class="flex h-full flex-1 flex-col overflow-y-auto">
            
            {{-- Header (Persis sama dengan Data Pendaftar, hanya ganti Judul) --}}
            <header class="flex h-16 items-center justify-between border-b border-gray-200 bg-white px-6 dark:bg-gray-800 dark:border-gray-700">
                <button onclick="toggleSidebar()" class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                
                {{-- Judul Halaman --}}
                <h1 class="text-xl font-bold text-gray-800 dark:text-white hidden md:block">Dashboard</h1>
                
                <div class="flex items-center gap-4">
                    {{-- Tombol Dark Mode --}}
                    <button id="theme-toggle" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">
                        <svg id="theme-toggle-dark-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                    
                    <div class="h-8 w-px bg-gray-300 dark:bg-gray-600 hidden md:block"></div>
                    
                    {{-- User Dropdown --}}
                    <div class="relative ml-2">
                        <button onclick="toggleAdminUserDropdown()" id="admin-user-menu-button" class="flex items-center gap-2 rounded-full bg-gray-100 p-1 pr-3 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600">
                            <img class="h-8 w-8 rounded-full object-cover border border-gray-300" src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('images/user.png') }}" alt="Avatar">
                            <span class="hidden text-sm font-medium text-gray-700 dark:text-gray-200 md:block">{{ Auth::user()->name }}</span>
                        </button>
                        <div id="admin-user-dropdown" class="absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 dark:bg-gray-800 hidden z-50">
                            <div class="px-4 py-3 border-b dark:border-gray-700">
                                <p class="text-sm text-gray-900 dark:text-white font-bold">{{ Auth::user()->name }}</p>
                            </div>
                            <ul class="py-1">
                                <li><a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">Dashboard</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20">Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Main Content --}}
            <main class="flex-1 p-6">
                {{-- Container Putih seperti tabel, tapi isinya ucapan selamat datang --}}
                <div class="rounded-lg bg-white shadow dark:bg-gray-800 overflow-hidden min-h-[400px] flex items-center justify-center">
                    <div class="text-center p-8">
                        {{-- Icon Selamat Datang (Optional) --}}
                        <div class="bg-blue-100 dark:bg-blue-900/30 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-campus-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                            Selamat Datang, {{ Auth::user()->name }}!
                        </h2>
                        <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto">
                            Anda telah berhasil masuk ke dalam Panel Admin. Silakan gunakan menu di samping untuk mengelola data.
                        </p>
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- Script JavaScript (Modal dihapus karena tidak dipakai di halaman ini) --}}
    <script>
        function toggleSidebar() { document.getElementById('sidebar')?.classList.toggle('-translate-x-full'); }
        function toggleAdminUserDropdown() { document.getElementById('admin-user-dropdown').classList.toggle('hidden'); }

        const themeToggleBtn = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        // Logic Icon Toggle
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            lightIcon.classList.remove('hidden');
        } else {
            darkIcon.classList.remove('hidden');
        }

        // Logic Click Toggle
        themeToggleBtn.addEventListener('click', function() {
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
    </script>
</body>
</html>