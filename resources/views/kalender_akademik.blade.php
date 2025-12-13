<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kalender Akademik - Kampus LSP</title>

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

    <main class="flex-grow pt-24 pb-16 px-4">
        <div class="max-w-6xl mx-auto">

            <div class="text-center mb-12">
                <span class="text-campus-600 dark:text-blue-400 font-bold tracking-wider uppercase text-sm">Tahun Ajaran 2025/2026</span>
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mt-2 mb-4">Kalender Akademik</h1>
                <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Jadwal lengkap kegiatan akademik, libur perkuliahan, dan periode penting lainnya untuk mahasiswa Kampus LSP.
                </p>
                
                <div class="mt-6">
                    <a href="{{ route('kalender.download') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-gray-800 hover:bg-gray-900 rounded-lg focus:ring-4 focus:ring-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Unduh PDF
                    </a>
                </div>
            </div>

            <div class="mb-12">
                <div class="flex items-center mb-6">
                    <div class="h-8 w-1 bg-campus-600 rounded-full mr-3"></div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Semester Ganjil</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="bg-blue-50 dark:bg-blue-900/20 px-6 py-3 border-b border-blue-100 dark:border-blue-800">
                            <h3 class="font-bold text-lg text-campus-600 dark:text-blue-400">Agustus 2025</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex gap-3">
                                <div class="font-bold text-gray-900 dark:text-white min-w-[40px]">01</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">Pembukaan KRS Online</div>
                            </div>
                            <div class="flex gap-3">
                                <div class="font-bold text-gray-900 dark:text-white min-w-[40px]">12-14</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">Pengenalan Kehidupan Kampus (PKKMB)</div>
                            </div>
                            <div class="flex gap-3">
                                <div class="font-bold text-gray-900 dark:text-white min-w-[40px]">19</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300 font-semibold text-green-600 dark:text-green-400">Awal Perkuliahan</div>
                            </div>
                            <div class="flex gap-3">
                                <div class="font-bold text-red-500 min-w-[40px]">17</div>
                                <div class="text-sm text-red-500 italic">Hari Kemerdekaan RI</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="bg-blue-50 dark:bg-blue-900/20 px-6 py-3 border-b border-blue-100 dark:border-blue-800">
                            <h3 class="font-bold text-lg text-campus-600 dark:text-blue-400">September 2025</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex gap-3">
                                <div class="font-bold text-gray-900 dark:text-white min-w-[40px]">01-30</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">Masa Perkuliahan Efektif</div>
                            </div>
                            <div class="flex gap-3">
                                <div class="font-bold text-gray-900 dark:text-white min-w-[40px]">25</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">Batas Perubahan KRS</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="bg-blue-50 dark:bg-blue-900/20 px-6 py-3 border-b border-blue-100 dark:border-blue-800">
                            <h3 class="font-bold text-lg text-campus-600 dark:text-blue-400">Oktober 2025</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex gap-3">
                                <div class="font-bold text-gray-900 dark:text-white min-w-[40px]">07-11</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300 font-semibold text-orange-500">Ujian Tengah Semester (UTS)</div>
                            </div>
                            <div class="flex gap-3">
                                <div class="font-bold text-gray-900 dark:text-white min-w-[40px]">20</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">Wisuda Periode II</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mb-8">
                <div class="flex items-center mb-6">
                    <div class="h-8 w-1 bg-green-500 rounded-full mr-3"></div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Semester Genap</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="bg-green-50 dark:bg-green-900/20 px-6 py-3 border-b border-green-100 dark:border-green-800">
                            <h3 class="font-bold text-lg text-green-600 dark:text-green-400">Januari 2026</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex gap-3">
                                <div class="font-bold text-red-500 min-w-[40px]">01</div>
                                <div class="text-sm text-red-500 italic">Tahun Baru Masehi</div>
                            </div>
                            <div class="flex gap-3">
                                <div class="font-bold text-gray-900 dark:text-white min-w-[40px]">13-17</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300 font-semibold text-orange-500">Ujian Akhir Semester (UAS) Ganjil</div>
                            </div>
                            <div class="flex gap-3">
                                <div class="font-bold text-gray-900 dark:text-white min-w-[40px]">20</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">Libur Semester Ganjil</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="bg-green-50 dark:bg-green-900/20 px-6 py-3 border-b border-green-100 dark:border-green-800">
                            <h3 class="font-bold text-lg text-green-600 dark:text-green-400">Februari 2026</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex gap-3">
                                <div class="font-bold text-gray-900 dark:text-white min-w-[40px]">02-06</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">Pengisian KRS Semester Genap</div>
                            </div>
                            <div class="flex gap-3">
                                <div class="font-bold text-gray-900 dark:text-white min-w-[40px]">16</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300 font-semibold text-green-600 dark:text-green-400">Awal Perkuliahan Genap</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    @include('layouts.footer')

</body>
</html>