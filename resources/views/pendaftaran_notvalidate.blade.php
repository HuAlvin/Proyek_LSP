<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menunggu Validasi Akun - PMB Kampus LSP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { 
            darkMode: 'class',
            theme: { 
                extend: { 
                    colors: { 
                        campus: { 600: '#2563eb', 700: '#1d4ed8' } 
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
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen flex flex-col font-sans antialiased transition-colors duration-300">

    @include('layouts.navbar')

    <main class="flex-1 flex items-center justify-center p-6 mt-16">
        <div class="max-w-lg w-full bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden text-center transition-colors duration-300">

            <div class="bg-yellow-50 dark:bg-yellow-900/20 p-8 flex justify-center transition-colors duration-300">
                <div class="bg-yellow-100 dark:bg-yellow-800/30 p-4 rounded-full">
                    <svg class="w-16 h-16 text-yellow-600 dark:text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2 transition-colors duration-300">Akun Menunggu Validasi</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed transition-colors duration-300">
                    Halo <span class="font-semibold text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</span>,<br>
                    Saat ini akun pendaftaran Anda sedang dalam antrean verifikasi oleh Admin. Anda belum dapat mengisi formulir pendaftaran sebelum akun Anda disetujui.
                </p>

                <div class="bg-blue-50 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 text-sm p-4 rounded-lg mb-6 text-left transition-colors duration-300">
                    <p class="font-bold flex items-center gap-2 mb-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Informasi:
                    </p>
                    <ul class="list-disc list-inside ml-1 space-y-1 opacity-90">
                        <li>Proses validasi biasanya memakan waktu 1x24 jam kerja.</li>
                        <li>Silakan cek kembali secara berkala.</li>
                        <li>Jika status berubah menjadi <b>Ditolak</b>, Anda akan dihubungi oleh Admin.</li>
                    </ul>
                </div>

                <div class="flex flex-col gap-3">
                    <a href="{{ route('user.status') }}" class="w-full bg-campus-600 hover:bg-campus-700 text-white font-medium py-2.5 rounded-lg transition shadow-lg shadow-blue-500/30">
                        Cek Status
                    </a>

                    <a href="{{ route('home') }}" class="w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 font-medium py-2.5 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>