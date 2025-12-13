<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Selesai - Kampus LSP</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
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
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased transition-colors duration-300 flex flex-col min-h-screen">

    @include('layouts.navbar')

    <main class="flex-grow flex items-center justify-center py-20 px-4">
        <div class="max-w-2xl w-full bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden text-center p-8 md:p-12">

            <div class="mx-auto w-24 h-24 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-6 animate-bounce">
                <svg class="w-12 h-12 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Pendaftaran Berhasil Dikirim!</h1>
            
            <p class="text-gray-600 dark:text-gray-300 text-lg mb-8 leading-relaxed">
                Terima kasih telah melakukan pendaftaran dan pembayaran. <br>
                Data Anda saat ini sedang dalam proses <span class="font-bold text-campus-600 dark:text-blue-400">verifikasi oleh Admin</span>.
                Status kelulusan akan diinformasikan melalui Email atau WhatsApp.
            </p>

            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-6 mb-8 text-left flex flex-col md:flex-row items-center gap-4 hover:shadow-md transition-shadow">
                <div class="p-3 bg-green-500 rounded-full text-white">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.017-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                </div>
                <div class="flex-grow">
                    <h3 class="font-bold text-gray-900 dark:text-white text-lg">Gabung Grup WhatsApp Maba</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Dapatkan informasi terbaru seputar orientasi dan jadwal perkuliahan.</p>
                </div>
                <a href="https://chat.whatsapp.com/GWcbCVm2ElsJ9saQK5efEP?mode=hqrt1" target="_blank" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 transition-colors whitespace-nowrap">
                    Gabung Sekarang
                </a>
            </div>

            <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-8 py-3 text-base font-medium text-white transition-all bg-campus-600 rounded-lg hover:bg-campus-800 hover:shadow-lg focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Kembali ke Beranda
            </a>

        </div>
    </main> 

</body>
</html>