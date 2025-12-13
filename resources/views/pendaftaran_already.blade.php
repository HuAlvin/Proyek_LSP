<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status Pendaftaran - Kampus LSP</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: { campus: { 600: '#2563eb', 800: '#1e40af' } }
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

    <main class="flex-grow flex items-center justify-center py-20 px-4">
        <div class="max-w-xl w-full bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden text-center p-8 md:p-12 relative">

            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-campus-600 to-blue-400"></div>

            <div class="mx-auto w-20 h-20 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mb-6">
                <svg class="w-10 h-10 text-campus-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-2">
                Anda Sudah Mendaftar
            </h1>
            
            <p class="text-gray-600 dark:text-gray-400 mb-8">
                Halo, <span class="font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>. <br>
                Kami telah menerima data pendaftaran Anda. Saat ini Anda tidak perlu mengisi formulir lagi.
            </p>

            @php
                $pendaftar = Auth::user()->pendaftar;
                $status = $pendaftar->status ?? 'pending';
                $statusColor = $status == 'verified' ? 'green' : ($status == 'rejected' ? 'red' : 'yellow');
                $statusLabel = $status == 'verified' ? 'Diterima' : ($status == 'rejected' ? 'Ditolak' : 'Menunggu Verifikasi');
            @endphp

            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6 mb-8 border border-gray-100 dark:border-gray-600 text-left">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Program Studi</span>
                    <span class="font-semibold text-gray-800 dark:text-white">{{ $pendaftar->prodi ?? '-' }}</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Tanggal Daftar</span>
                    <span class="font-medium text-gray-800 dark:text-white">
                        {{ $pendaftar->created_at ? $pendaftar->created_at->format('d M Y') : '-' }}
                    </span>
                </div>
                <div class="flex justify-between items-center pt-2 border-t border-gray-200 dark:border-gray-600 mt-2">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Status Terkini</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $statusColor }}-100 text-{{ $statusColor }}-800 dark:bg-{{ $statusColor }}-900 dark:text-{{ $statusColor }}-300 capitalize">
                        {{ $statusLabel }}
                    </span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700 transition-all">
                    Kembali ke Beranda
                </a>

                <a href="{{ route('user.status') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-campus-600 rounded-lg hover:bg-campus-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 transition-all shadow-lg hover:shadow-xl">
                    Lihat Status Saya
                </a>
            </div>

        </div>
    </main>

</body>
</html>