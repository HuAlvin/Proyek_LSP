<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Validasi Data - Kampus LSP</title>
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

    <div class="pt-24 pb-12 px-4">
        <div class="max-w-3xl mx-auto">

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 p-8 text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-yellow-100 dark:bg-yellow-900 mb-4">
                    <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Pendaftaran Sedang Divalidasi</h1>
                <p class="text-gray-600 dark:text-gray-400">
                    Data Anda telah kami terima dengan status <span class="font-bold text-yellow-600 bg-yellow-100 px-2 py-0.5 rounded text-sm uppercase">{{ $pendaftar->status }}</span>.
                    <br>Mohon menunggu admin melakukan verifikasi data sebelum melanjutkan ke tahap pembayaran/selanjutnya.
                </p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Ringkasan Data Pendaftar</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Nama Lengkap</p>
                            <p class="font-medium text-gray-900 dark:text-white">{{ $pendaftar->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">NIK</p>
                            <p class="font-medium text-gray-900 dark:text-white">{{ $pendaftar->nik }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Program Studi Pilihan</p>
                            <p class="font-medium text-campus-600 dark:text-blue-400">{{ $pendaftar->prodi }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Email Terdaftar</p>
                            <p class="font-medium text-gray-900 dark:text-white">{{ $pendaftar->email }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Berkas yang diupload:</p>
                        <div class="flex gap-4">
                            <a href="{{ asset('storage/' . $pendaftar->ijazah) }}" target="_blank" class="text-sm text-blue-600 hover:underline flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                Lihat Ijazah
                            </a>
                            <a href="{{ asset('storage/' . $pendaftar->foto) }}" target="_blank" class="text-sm text-blue-600 hover:underline flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Lihat Foto
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-4 flex justify-between items-center">
                    <a href="{{ route('home') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                        Kembali ke Beranda
                    </a>

                    <a href="{{ route('user.status') }}" class="inline-flex items-center gap-2 text-sm bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 px-4 py-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition font-medium text-gray-700 dark:text-gray-200 shadow-sm">
                        <span>Cek Status Pendaftaran</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>

</body>
</html>