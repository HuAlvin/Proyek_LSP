<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visi & Misi - Kampus LSP</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

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

        <section class="relative pt-32 pb-20 bg-gradient-to-br from-campus-600 to-blue-800 dark:from-gray-800 dark:to-gray-900 overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
            
            <div class="relative max-w-screen-xl mx-auto px-4 text-center text-white">
                <span class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm text-white text-xs font-bold tracking-widest mb-4 border border-white/30">
                    ARAH & TUJUAN
                </span>
                <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl mb-4">
                    Visi dan Misi
                </h1>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light">
                    Komitmen kami dalam membangun masa depan pendidikan yang berkualitas, inovatif, dan berdaya saing global.
                </p>
            </div>
        </section>

        <div class="max-w-screen-xl mx-auto px-4 py-16 space-y-20">
            
            <section class="text-center">
                <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-10 shadow-xl border-t-4 border-campus-600 dark:border-blue-500 max-w-4xl mx-auto transform hover:-translate-y-1 transition-transform duration-300">
                    
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-campus-600 dark:bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg ring-4 ring-gray-50 dark:ring-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>

                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 mt-4">Visi</h2>
                    <p class="text-2xl font-medium text-gray-600 dark:text-gray-300 italic leading-relaxed">
                        "Menjadi Perguruan Tinggi unggulan berbasis teknologi digital yang mencetak lulusan kompeten, berkarakter, dan berdaya saing di tingkat global pada tahun 2030."
                    </p>
                </div>
            </section>

            <section>
                <div class="flex items-center justify-center mb-10">
                    <div class="h-px w-16 bg-campus-600 dark:bg-blue-500"></div>
                    <h2 class="mx-4 text-3xl font-bold text-gray-900 dark:text-white">Misi</h2>
                    <div class="h-px w-16 bg-campus-600 dark:bg-blue-500"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="flex items-start gap-4 p-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-gray-700">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 dark:bg-blue-900/50 text-campus-600 dark:text-blue-300 rounded-lg flex items-center justify-center font-bold text-lg">1</div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Pendidikan Berkualitas</h3>
                            <p class="text-gray-600 dark:text-gray-400">Menyelenggarakan pendidikan dan pengajaran yang berbasis kompetensi sesuai dengan kebutuhan industri dan perkembangan teknologi.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-gray-700">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 dark:bg-blue-900/50 text-campus-600 dark:text-blue-300 rounded-lg flex items-center justify-center font-bold text-lg">2</div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Penelitian Inovatif</h3>
                            <p class="text-gray-600 dark:text-gray-400">Mengembangkan penelitian terapan yang inovatif dan bermanfaat bagi kemajuan ilmu pengetahuan serta kesejahteraan masyarakat.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-gray-700">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 dark:bg-blue-900/50 text-campus-600 dark:text-blue-300 rounded-lg flex items-center justify-center font-bold text-lg">3</div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Pengabdian Masyarakat</h3>
                            <p class="text-gray-600 dark:text-gray-400">Melaksanakan pengabdian kepada masyarakat melalui penerapan teknologi tepat guna untuk memberdayakan potensi lokal.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100 dark:border-gray-700">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 dark:bg-blue-900/50 text-campus-600 dark:text-blue-300 rounded-lg flex items-center justify-center font-bold text-lg">4</div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Kerjasama Global</h3>
                            <p class="text-gray-600 dark:text-gray-400">Membangun kerjasama strategis dengan instansi pemerintah, industri, dan perguruan tinggi lain di tingkat nasional maupun internasional.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-blue-50 dark:bg-gray-800/50 rounded-3xl p-8 md:p-12">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Tujuan Kami</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Target yang ingin kami capai dalam 5 tahun ke depan.</p>
                </div>
                
                <div class="flex flex-wrap justify-center gap-4">
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white dark:bg-gray-700 border border-blue-100 dark:border-gray-600 shadow-sm text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Lulusan Terserap Industri 90%
                    </span>
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white dark:bg-gray-700 border border-blue-100 dark:border-gray-600 shadow-sm text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Akreditasi Unggul
                    </span>
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white dark:bg-gray-700 border border-blue-100 dark:border-gray-600 shadow-sm text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Pusat Inovasi Digital
                    </span>
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white dark:bg-gray-700 border border-blue-100 dark:border-gray-600 shadow-sm text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Kampus Ramah Lingkungan
                    </span>
                </div>
            </section>

        </div>
    </main>

    @include('layouts.footer')

</body>
</html>