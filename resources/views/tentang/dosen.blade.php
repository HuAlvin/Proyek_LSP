<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dosen & Staff - Kampus LSP</title>

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
                    TIM PENGAJAR
                </span>
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl">
                    Dosen & Staff Pengajar
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-400">
                    Kami memiliki tenaga pengajar profesional yang ahli di bidangnya untuk membimbing mahasiswa mencapai potensi terbaik.
                </p>
            </div>
        </section>

        <div class="max-w-screen-xl mx-auto px-4 py-16 space-y-20">

            <section>
                <div class="flex items-center mb-8">
                    <div class="w-2 h-8 bg-blue-500 rounded-r-md mr-4"></div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Teknik Informatika (S1)</h2>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Verrino+Aditya&background=0D8ABC&color=fff&size=256" alt="Dosen">
                            <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">KAPRODI</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Verrino Aditya, M.Kom.</h3>
                            <p class="text-sm text-campus-600 dark:text-blue-400 mb-3">Artificial Intelligence</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Spesialisasi dalam Machine Learning dan pengembangan sistem cerdas berbasis Python.</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Budi+Rahardjo&background=random&size=256" alt="Dosen">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Ir. Budi Rahardjo, M.T.</h3>
                            <p class="text-sm text-campus-600 dark:text-blue-400 mb-3">Cyber Security</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Ahli keamanan jaringan dan kriptografi dengan sertifikasi internasional CEH.</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Siska+Putri&background=random&size=256" alt="Dosen">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Siska Putri, S.Kom., M.Cs.</h3>
                            <p class="text-sm text-campus-600 dark:text-blue-400 mb-3">Mobile Development</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Pengembang aplikasi Android & iOS dengan pengalaman di industri startup Unicorn.</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Agus+Susanto&background=random&size=256" alt="Dosen">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Dr. Agus Susanto</h3>
                            <p class="text-sm text-campus-600 dark:text-blue-400 mb-3">Cloud Computing</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Peneliti aktif di bidang komputasi awan dan arsitektur sistem terdistribusi.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="flex items-center mb-8">
                    <div class="w-2 h-8 bg-green-500 rounded-r-md mr-4"></div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Sistem Informasi (S1)</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Hocwin+Hebert&background=10B981&color=fff&size=256" alt="Dosen">
                            <div class="absolute top-0 right-0 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">KAPRODI</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Hocwin Hebert, S.Kom. M.TI.</h3>
                            <p class="text-sm text-green-600 dark:text-green-400 mb-3">Enterprise System</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Konsultan ERP dengan sertifikasi SAP dan pengalaman implementasi di BUMN.</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Dewi+Sartika&background=random&size=256" alt="Dosen">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Dewi Sartika, M.M.S.I.</h3>
                            <p class="text-sm text-green-600 dark:text-green-400 mb-3">Data Analyst</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Fokus pada analisis big data dan visualisasi data untuk pengambilan keputusan bisnis.</p>
                        </div>
                    </div>

                     <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Rudi+Hartono&background=random&size=256" alt="Dosen">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Rudi Hartono, S.Kom., M.Kom.</h3>
                            <p class="text-sm text-green-600 dark:text-green-400 mb-3">IT Governance</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Auditor sistem informasi bersertifikat CISA dengan fokus pada tata kelola IT.</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Lina+Marlina&background=random&size=256" alt="Dosen">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Lina Marlina, M.TI.</h3>
                            <p class="text-sm text-green-600 dark:text-green-400 mb-3">E-Business</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Pakar strategi bisnis digital dan transformasi digital perusahaan.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="flex items-center mb-8">
                    <div class="w-2 h-8 bg-purple-500 rounded-r-md mr-4"></div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Bisnis Digital (S1)</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Jonathan+Felix&background=8B5CF6&color=fff&size=256" alt="Dosen">
                            <div class="absolute top-0 right-0 bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">KAPRODI</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Jonathan Felix Levid, M.T.</h3>
                            <p class="text-sm text-purple-600 dark:text-purple-400 mb-3">Digital Marketing</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Praktisi pemasaran digital dengan pengalaman mengelola kampanye brand internasional.</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Sarah+Amalia&background=random&size=256" alt="Dosen">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Sarah Amalia, S.E., M.M.</h3>
                            <p class="text-sm text-purple-600 dark:text-purple-400 mb-3">Entrepreneurship</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Mentor startup inkubator bisnis dan pemilik usaha retail fashion online.</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Bambang+Supriyanto&background=random&size=256" alt="Dosen">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Dr. Bambang Supriyanto</h3>
                            <p class="text-sm text-purple-600 dark:text-purple-400 mb-3">Fintech</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Peneliti ekonomi digital dengan fokus pada teknologi finansial dan blockchain.</p>
                        </div>
                    </div>
                     <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 dark:border-gray-700 overflow-hidden group">
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 src="https://ui-avatars.com/api/?name=Maya+Indah&background=random&size=256" alt="Dosen">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Maya Indah, M.B.A.</h3>
                            <p class="text-sm text-purple-600 dark:text-purple-400 mb-3">E-Commerce</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2">Spesialis manajemen operasional e-commerce dan logistik digital.</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    @include('layouts.footer')

</body>
</html>