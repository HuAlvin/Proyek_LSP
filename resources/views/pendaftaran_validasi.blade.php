<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akses Dibatasi - Kampus LSP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: { colors: { campus: { 600: '#2563eb', 800: '#1e40af' } } }
            }
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 font-sans antialiased text-gray-900 dark:text-gray-100">

    {{-- Include Navbar agar user bisa navigasi ke tempat lain --}}
    @include('layouts.navbar')

    <div class="min-h-screen flex flex-col justify-center items-center px-6 pt-24 pb-10">
        
        <div class="w-full max-w-md bg-white dark:bg-gray-800 border border-yellow-200 dark:border-yellow-900/50 shadow-lg rounded-2xl p-8 text-center">

            <div class="mx-auto flex items-center justify-center w-20 h-20 rounded-full bg-yellow-100 dark:bg-yellow-900/30 mb-6">
                <svg class="w-10 h-10 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>

            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">
                Akses Terkunci
            </h2>

            <p class="text-gray-600 dark:text-gray-300 mb-6">
                Mohon maaf, Anda belum dapat mengakses formulir pendaftaran. Akun Anda saat ini sedang dalam proses 
                <span class="font-bold text-yellow-600 dark:text-yellow-400">Verifikasi Admin</span>.
            </p>

            <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-4 text-sm text-left mb-6 border-l-4 border-yellow-400">
                <p class="text-yellow-800 dark:text-yellow-200">
                    Silakan cek status verifikasi Anda secara berkala di halaman Status Pendaftaran.
                </p>
            </div>

            <div class="flex flex-col gap-3">
                <a href="{{ route('user.status') }}" class="w-full inline-flex justify-center items-center px-5 py-3 bg-campus-600 hover:bg-campus-800 text-white text-sm font-bold rounded-xl transition-colors shadow-lg shadow-blue-500/30">
                    Lihat Status Pendaftaran &rarr;
                </a>
                
                <a href="{{ route('home') }}" class="w-full inline-flex justify-center items-center px-5 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 text-sm font-medium rounded-xl transition-colors">
                    Kembali ke Beranda
                </a>
            </div>

        </div>

    </div>

</body>
</html>