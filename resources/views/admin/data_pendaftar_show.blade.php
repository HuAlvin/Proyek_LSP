<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pendaftar - {{ $pendaftar->name }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: { colors: { campus: { 600: '#2563eb', 800: '#1e40af' } } }
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
<body class="bg-gray-50 dark:bg-gray-900 font-sans antialiased transition-colors duration-300">

    <div class="flex h-screen overflow-hidden">

        @include('layouts.navbar_admin')

        <div class="flex h-full flex-1 flex-col overflow-y-auto">

            <header class="flex h-16 shrink-0 items-center justify-between border-b border-gray-200 bg-white px-6 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.pendaftar') }}" class="text-gray-500 hover:text-campus-600 dark:text-gray-400 dark:hover:text-blue-400 transition-colors">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </a>
                    <h1 class="text-xl font-bold text-gray-800 dark:text-white">Detail Pendaftar</h1>
                </div>

                <div class="flex items-center gap-4">
                    <button id="theme-toggle" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        <svg id="theme-toggle-dark-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                    <div class="h-8 w-px bg-gray-300 dark:bg-gray-600 hidden md:block"></div>
                    <div class="relative ml-2">
                        <button onclick="toggleAdminUserDropdown()" id="admin-user-menu-button" class="flex items-center gap-2 rounded-full bg-gray-100 p-1 pr-3 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600 transition-all">
                            <img class="h-8 w-8 rounded-full object-cover border border-gray-300 dark:border-gray-500" src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('images/user.png') }}" alt="Avatar">
                            <span class="hidden text-sm font-medium text-gray-700 dark:text-gray-200 md:block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="admin-user-dropdown" class="absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-800 dark:ring-gray-700 hidden z-50 divide-y divide-gray-100 dark:divide-gray-700">
                            <div class="px-4 py-3">
                                <p class="text-sm text-gray-900 dark:text-white font-bold">{{ Auth::user()->name }}</p>
                                <p class="text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</p>
                            </div>
                            <ul class="py-1">
                                <li><a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">Dashboard</a></li>
                                <li><a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">Profile Settings</a></li>
                                <li><form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 font-semibold">Log Out</button></form></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6">
                <div class="max-w-6xl mx-auto">

                    <div class="mb-6 rounded-lg p-4 flex items-center justify-between shadow-sm 
                        {{ $pendaftar->status == 'verified' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300' : 
                          ($pendaftar->status == 'rejected' ? 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300' : 
                           'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300') }}">
                        <div class="flex items-center gap-3">
                            @if($pendaftar->status == 'verified')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="font-bold text-lg">DITERIMA</span>
                            @elseif($pendaftar->status == 'rejected')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="font-bold text-lg">DITOLAK</span>
                            @else
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="font-bold text-lg">MENUNGGU VERIFIKASI</span>
                            @endif
                        </div>
                        <div class="text-sm opacity-75">
                            Terdaftar pada: {{ \Carbon\Carbon::parse($pendaftar->created_at)->format('d F Y, H:i') }} WIB
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        <div class="lg:col-span-2 space-y-6">

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Informasi Pribadi</h3>
                                </div>
                                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Nama Lengkap</p>
                                        <p class="font-medium text-gray-900 dark:text-white text-lg">{{ $pendaftar->name }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Program Studi Pilihan</p>
                                        <p class="font-bold text-campus-600 dark:text-blue-400 text-lg">{{ $pendaftar->prodi }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">NIK</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $pendaftar->nik }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Jenis Kelamin</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $pendaftar->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Tempat, Tanggal Lahir</p>
                                        <p class="font-medium text-gray-900 dark:text-white">
                                            {{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d M Y') }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Agama</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $pendaftar->agama }}</p>
                                    </div>
                                    <div class="md:col-span-2">
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Alamat Lengkap</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $pendaftar->alamat }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Kontak</h3>
                                </div>
                                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="flex items-start gap-3">
                                        <div class="p-2 bg-blue-100 dark:bg-blue-900/30 rounded text-blue-600 dark:text-blue-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                                            <a href="mailto:{{ $pendaftar->email }}" class="font-medium text-gray-900 dark:text-white hover:text-campus-600 underline decoration-dotted">{{ $pendaftar->email }}</a>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="p-2 bg-green-100 dark:bg-green-900/30 rounded text-green-600 dark:text-green-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">WhatsApp / Telepon</p>
                                            <a href="https://wa.me/{{ $pendaftar->phone }}" target="_blank" class="font-medium text-gray-900 dark:text-white hover:text-green-600 underline decoration-dotted">{{ $pendaftar->phone }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="space-y-6">

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 flex flex-col items-center">
                                <h3 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-4">Pas Foto</h3>
                                <div class="w-40 h-48 bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden border dark:border-gray-600 shadow-sm">
                                    <img src="{{ asset('storage/' . $pendaftar->foto) }}" alt="Pas Foto" class="w-full h-full object-cover">
                                </div>
                                <a href="{{ asset('storage/' . $pendaftar->foto) }}" target="_blank" class="mt-4 text-sm text-campus-600 hover:underline dark:text-blue-400">Lihat Ukuran Penuh</a>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Berkas Pendukung</h3>
                                </div>
                                <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                    <div class="p-4 flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                            <div>
                                                <p class="font-medium text-gray-900 dark:text-white">Ijazah / SKL</p>
                                                <p class="text-xs text-gray-500">Berkas Utama</p>
                                            </div>
                                        </div>
                                        <a href="{{ asset('storage/' . $pendaftar->ijazah) }}" target="_blank" class="px-3 py-1.5 text-xs font-bold text-gray-700 bg-gray-100 rounded hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                                            LIHAT
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>

                            @if($pendaftar->status == 'pending')
                                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Verifikasi Pendaftaran</h3>
                                    <div class="grid grid-cols-2 gap-4">
                                        <button type="button" onclick="openModal('rejected')" class="w-full flex justify-center items-center gap-2 px-4 py-3 bg-white border border-red-500 text-red-600 rounded-lg hover:bg-red-50 font-bold transition dark:bg-gray-800 dark:border-red-600 dark:text-red-400 dark:hover:bg-red-900/20">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            Tolak
                                        </button>

                                        <button type="button" onclick="openModal('verified')" class="w-full flex justify-center items-center gap-2 px-4 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 shadow-md hover:shadow-lg font-bold transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            Terima
                                        </button>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <div id="confirmationModal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg dark:bg-gray-800">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 dark:bg-gray-800">
                        <div class="sm:flex sm:items-start">
                            <div id="modalIcon" class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-white" id="modalTitle">Konfirmasi</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-400" id="modalMessage">Apakah Anda yakin?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 dark:bg-gray-700/50">
                        <form id="verificationForm" method="POST" action="">
                            @csrf
                            @method('PATCH')
                            <button type="submit" id="confirmBtn" class="inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto">
                                Ya, Lanjutkan
                            </button>
                        </form>
                        <button type="button" onclick="closeModal()" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto dark:bg-gray-700 dark:text-gray-300 dark:ring-gray-600 dark:hover:bg-gray-600">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() { document.getElementById('sidebar').classList.toggle('-translate-x-full'); }
        function toggleAdminUserDropdown() { document.getElementById('admin-user-dropdown').classList.toggle('hidden'); }

        function openModal(type) {
            const modal = document.getElementById('confirmationModal');
            const form = document.getElementById('verificationForm');
            const title = document.getElementById('modalTitle');
            const message = document.getElementById('modalMessage');
            const icon = document.getElementById('modalIcon');
            const btn = document.getElementById('confirmBtn');

            let url = "";
            if (type === 'verified') {
                url = "{{ route('admin.pendaftar.verify', ['id' => $pendaftar->id, 'status' => 'verified']) }}";
                title.innerText = "Konfirmasi Penerimaan";
                message.innerText = "Apakah Anda yakin ingin MENERIMA pendaftar ini? Status akan berubah menjadi diterima dan mahasiswa dapat melanjutkan ke tahap pembayaran.";
                icon.className = "mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10";
                icon.innerHTML = '<svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                btn.className = "inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto";
                btn.innerText = "Ya, Terima";
            } else {
                url = "{{ route('admin.pendaftar.verify', ['id' => $pendaftar->id, 'status' => 'rejected']) }}";
                title.innerText = "Konfirmasi Penolakan";
                message.innerText = "Apakah Anda yakin ingin MENOLAK pendaftar ini?";
                icon.className = "mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10";
                icon.innerHTML = '<svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                btn.className = "inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto";
                btn.innerText = "Ya, Tolak";
            }

            form.action = url;
            modal.classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('confirmationModal').classList.add('hidden');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('confirmationModal');
            if (event.target == modal.querySelector('.fixed.inset-0.bg-gray-900')) {
                closeModal();
            }
            if (!event.target.closest('#admin-user-menu-button')) {
                const dropdown = document.getElementById('admin-user-dropdown');
                if (dropdown && !dropdown.classList.contains('hidden')) dropdown.classList.add('hidden');
            }
        }

        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }
        var themeToggleBtn = document.getElementById('theme-toggle');
        themeToggleBtn.addEventListener('click', function() {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark'); localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark'); localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark'); localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark'); localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>
</body>
</html>