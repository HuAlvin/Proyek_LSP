<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struktur Organisasi - Kampus LSP</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        campus: { 600: '#2563eb', 800: '#1e40af' }
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

<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased transition-colors duration-300 flex flex-col min-h-screen">

    @include('layouts.navbar')

    <main class="flex-grow">
        
        <section class="relative pt-32 pb-20 bg-white dark:bg-gray-800 overflow-hidden">
            <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
            <div class="relative max-w-screen-xl mx-auto px-4 text-center">
                <span class="inline-block py-1 px-3 rounded-full bg-blue-50 text-campus-600 text-xs font-bold tracking-widest mb-4 border border-blue-100 dark:bg-blue-900/30 dark:text-blue-300 dark:border-blue-800">
                    KEPEMIMPINAN
                </span>
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl">
                    Struktur Organisasi
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-400">
                    Mengenal para pimpinan yang berdedikasi memajukan Kampus LSP.
                </p>
            </div>
        </section>

        <section class="py-16 px-4">
            <div class="max-w-screen-xl mx-auto">
                
                <div class="flex justify-center mb-12">
                    <div class="group relative w-full max-w-sm bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-campus-600 transform hover:-translate-y-2">
                        <div class="p-6 text-center">
                            <div class="relative w-32 h-32 mx-auto mb-4">
                                <div class="absolute inset-0 rounded-full bg-campus-600 blur-md opacity-20 group-hover:opacity-40 transition-opacity"></div>
                                <img class="relative w-32 h-32 rounded-full object-cover border-4 border-white dark:border-gray-700 shadow-sm" 
                                     src="https://ui-avatars.com/api/?name=Dr.+Budi+Santoso&background=2563eb&color=fff&size=128" 
                                     alt="Rektor">
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Prof. Dr. Alvin Hujaya, M.Kom. M.Si.</h3>
                            <p class="text-campus-600 dark:text-blue-400 font-medium mb-3">Rektor</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                "Memimpin dengan visi, melayani dengan hati untuk mencetak generasi emas."
                            </p>
                        </div>
                        <div class="absolute left-1/2 -bottom-12 w-px h-12 bg-gray-300 dark:bg-gray-600 -translate-x-1/2 hidden md:block"></div>
                    </div>
                </div>

                <div class="hidden md:block w-2/3 mx-auto h-px bg-gray-300 dark:bg-gray-600 mb-12 relative">
                    <div class="absolute left-0 top-0 w-px h-8 bg-gray-300 dark:bg-gray-600"></div>
                    <div class="absolute left-1/2 top-0 w-px h-8 bg-gray-300 dark:bg-gray-600 -translate-x-1/2"></div>
                    <div class="absolute right-0 top-0 w-px h-8 bg-gray-300 dark:bg-gray-600"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 text-center border border-gray-100 dark:border-gray-700 hover:border-campus-600 transition-colors">
                        <img class="w-24 h-24 rounded-full mx-auto mb-4 object-cover" src="https://ui-avatars.com/api/?name=Prof.+Siti+Aminah&background=random" alt="WR 1">
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white">Prof. Dr. William Tanuwijaya, M.Kom. Ph.D.</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-semibold">Wakil Rektor I</p>
                        <span class="text-xs text-blue-500 bg-blue-50 dark:bg-blue-900/30 px-2 py-1 rounded-full mt-2 inline-block">Bidang Akademik</span>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 text-center border border-gray-100 dark:border-gray-700 hover:border-campus-600 transition-colors">
                        <img class="w-24 h-24 rounded-full mx-auto mb-4 object-cover" src="https://ui-avatars.com/api/?name=Drs.+Hendra+Gunawan&background=random" alt="WR 2">
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white">Prof. Dr. Christofer Evan Setiawan, M.Kom.</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-semibold">Wakil Rektor II</p>
                        <span class="text-xs text-green-500 bg-green-50 dark:bg-green-900/30 px-2 py-1 rounded-full mt-2 inline-block">Keuangan & SDM</span>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 text-center border border-gray-100 dark:border-gray-700 hover:border-campus-600 transition-colors">
                        <img class="w-24 h-24 rounded-full mx-auto mb-4 object-cover" src="https://ui-avatars.com/api/?name=Ir.+Joko+Susilo&background=random" alt="WR 3">
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white">Ir. Umar Mudhor, M.T.</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-semibold">Wakil Rektor III</p>
                        <span class="text-xs text-orange-500 bg-orange-50 dark:bg-orange-900/30 px-2 py-1 rounded-full mt-2 inline-block">Kemahasiswaan</span>
                    </div>
                </div>

                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-8 relative">
                        <span class="relative z-10 bg-gray-50 dark:bg-gray-900 px-4">Ketua Program Studi</span>
                        <div class="absolute top-1/2 left-0 w-full h-px bg-gray-300 dark:bg-gray-700 -z-0"></div>
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <div class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border-l-4 border-blue-500 hover:shadow-md transition-shadow">
                            <img class="w-16 h-16 rounded-full mr-4" src="https://ui-avatars.com/api/?name=Andi+Prasetyo&background=0D8ABC&color=fff" alt="Kaprodi TI">
                            <div>
                                <h5 class="font-bold text-gray-900 dark:text-white">Verrino Aditya, M.Kom.</h5>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Kaprodi Teknik Informatika</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border-l-4 border-green-500 hover:shadow-md transition-shadow">
                            <img class="w-16 h-16 rounded-full mr-4" src="https://ui-avatars.com/api/?name=Rina+Wati&background=10B981&color=fff" alt="Kaprodi SI">
                            <div>
                                <h5 class="font-bold text-gray-900 dark:text-white">Hocwin Hebert, S.Kom. M.TI.</h5>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Kaprodi Sistem Informasi</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border-l-4 border-purple-500 hover:shadow-md transition-shadow">
                            <img class="w-16 h-16 rounded-full mr-4" src="https://ui-avatars.com/api/?name=Dimas+Anggara&background=8B5CF6&color=fff" alt="Kaprodi BD">
                            <div>
                                <h5 class="font-bold text-gray-900 dark:text-white">Jonathan Felix Levid, M.T.</h5>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Kaprodi Bisnis Digital</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>