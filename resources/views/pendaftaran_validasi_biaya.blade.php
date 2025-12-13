<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Validasi Pembayaran - Kampus LSP</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
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

<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased">

    @include('layouts.navbar')

    <div class="pt-24 pb-12 px-4 flex items-center justify-center min-h-[80vh]">
        <div class="max-w-2xl w-full mx-auto">
            
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden text-center p-10">

                <div class="relative mb-6 inline-block">
                    <div class="absolute inset-0 bg-blue-100 dark:bg-blue-900/30 rounded-full animate-ping opacity-75"></div>
                    <div class="relative bg-blue-100 dark:bg-blue-900/50 rounded-full p-6 text-blue-600 dark:text-blue-400">
                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Bukti Pembayaran Diterima</h1>
                
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                    Terima kasih! Bukti transfer Anda telah berhasil diunggah.<br>
                    Tim Keuangan kami sedang melakukan <span class="font-bold text-blue-600 dark:text-blue-400">verifikasi pembayaran</span>. Proses ini biasanya memakan waktu maksimal <strong>1x24 jam</strong> kerja.
                </p>

                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-xl p-6 border border-blue-100 dark:border-blue-800 mb-8 text-left">
                    <h3 class="font-bold text-blue-800 dark:text-blue-300 mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Langkah Selanjutnya:
                    </h3>
                    <ul class="list-disc list-inside text-sm text-blue-700 dark:text-blue-200 space-y-1 ml-1">
                        <li>Pantau status pendaftaran Anda secara berkala.</li>
                        <li>Jika pembayaran valid, status Anda akan berubah menjadi <strong>"Pendaftaran Selesai"</strong>.</li>
                        <li>Jika ada masalah dengan bukti bayar, status akan berubah menjadi "Ditolak" dan Anda perlu mengupload ulang.</li>
                    </ul>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" class="px-6 py-3 rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition w-full sm:w-auto">
                        Kembali ke Beranda
                    </a>
                    <a href="{{ route('user.status') }}" class="px-6 py-3 rounded-lg bg-campus-600 text-white font-bold hover:bg-campus-800 transition shadow-lg shadow-blue-500/30 w-full sm:w-auto flex items-center justify-center gap-2">
                        <span>Cek Status Pendaftaran</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                </div>

            </div>

            <p class="text-center text-sm text-gray-400 mt-8">
                &copy; {{ date('Y') }} Kampus LSP. All Rights Reserved.
            </p>

        </div>
    </div>

</body>
</html>