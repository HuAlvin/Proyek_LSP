<nav class="bg-white dark:bg-gray-900 fixed w-full z-40 top-0 border-b border-gray-200 dark:border-gray-700 shadow-sm transition-colors duration-300">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo.png') }}" class="h-10 w-10 rounded-full object-cover" alt="Logo Kampus" onerror="this.style.display='none'">
            <span class="self-center text-2xl font-bold whitespace-nowrap text-campus-800 dark:text-blue-400">Kampus LSP</span>
        </a>

        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ route('home') }}" class="text-gray-900 dark:text-white hover:text-campus-600 font-medium transition-colors">Beranda</a>

            <div class="relative">
                <button id="tentang-button" onclick="toggleTentangDropdown()" class="flex items-center text-gray-900 dark:text-white hover:text-campus-600 font-medium transition-colors focus:outline-none">
                    Tentang
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                
                <div id="tentang-dropdown" class="hidden absolute z-50 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-48 dark:bg-gray-700 dark:divide-gray-600 mt-2">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400">
                        <li><a href="{{ route('tentang.sejarah') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sejarah LSP</a></li>
                        <li><a href="{{ route('tentang.visi_misi') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Visi dan Misi</a></li>
                        <li><a href="{{ route('tentang.struktur_organisasi') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Struktur Organisasi</a></li>
                        <li><a href="{{ route('tentang.dosen') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dosen</a></li>
                        <li><a href="{{ route('tentang.fasilitas') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Fasilitas</a></li>
                    </ul>
                </div>
            </div>

            <a href="{{ route('pengumuman.index') }}" class="text-gray-900 dark:text-white hover:text-campus-600 font-medium transition-colors">Pengumuman</a>

            <a href="{{ route('kalender.index') }}" class="text-gray-900 dark:text-white hover:text-campus-600 font-medium transition-colors">Kalender Akademik</a>

            @if (Route::has('register'))
                <a href="{{ route('pendaftaran.create') }}" class="text-gray-900 dark:text-white hover:text-campus-600 font-medium transition-colors">Pendaftaran</a>
            @endif
        </div>

        <div class="flex md:order-2 items-center relative">

            @if (Route::has('login'))
                @auth
                    <div class="relative">
                        <button type="button" class="flex items-center gap-2 text-sm bg-gray-100 dark:bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 p-1 pr-3 transition-all hover:bg-gray-200 dark:hover:bg-gray-700" id="user-menu-button" aria-expanded="false" onclick="toggleUserDropdown()">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full border border-gray-300 dark:border-gray-600 object-cover" 
                                 src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('images/user.png') }}" 
                                 alt="user photo">
                            <span class="font-medium text-gray-700 dark:text-gray-300 hidden md:block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <div class="hidden z-50 absolute right-0 mt-2 text-base list-none bg-white dark:bg-gray-800 divide-y divide-gray-100 dark:divide-gray-700 rounded-lg shadow-lg w-64 border border-gray-100 dark:border-gray-700" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white font-bold">{{ Auth::user()->name }}</span>
                                <span class="block text-sm text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                @if(Auth::user()->role === 'admin')
                                <li>
                                    <a href="{{ route('admin.verifikasi_akun') }}" class="block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 font-semibold">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            Halaman Admin
                                        </div>
                                    </a>
                                </li>
                                @endif

                                <li>
                                    <a href="{{ route('user.status') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <div class="flex items-center justify-between">
                                            <span>Status Pendaftaran</span>
                                            @if(Auth::user()->status_verifikasi == 'verified')
                                                <span class="flex h-2.5 w-2.5 rounded-full bg-green-500 ring-2 ring-white dark:ring-gray-800" title="Terverifikasi"></span>
                                            @elseif(Auth::user()->status_verifikasi == 'rejected')
                                                <span class="flex h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white dark:ring-gray-800" title="Ditolak"></span>
                                            @else
                                                <span class="flex h-2.5 w-2.5 rounded-full bg-yellow-400 ring-2 ring-white dark:ring-gray-800" title="Menunggu"></span>
                                            @endif
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Profile Settings</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 font-medium">Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="flex items-center">
                        <a href="{{ route('login') }}" class="text-gray-900 dark:text-white hover:text-campus-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white bg-campus-600 hover:bg-campus-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-lg shadow-blue-500/30">Daftar</a>
                        @endif
                    </div>
                @endauth
            @endif
            
            <div class="h-8 w-px bg-gray-300 dark:bg-gray-600 mx-3 hidden md:block"></div>

            <button id="theme-toggle" type="button" class="ml-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>

    <script>
        function toggleTentangDropdown() {
            const dropdown = document.getElementById('tentang-dropdown');
            const userDropdown = document.getElementById('user-dropdown');
            if (userDropdown && !userDropdown.classList.contains('hidden')) userDropdown.classList.add('hidden');
            dropdown.classList.toggle('hidden');
        }

        function toggleUserDropdown() {
            const dropdown = document.getElementById('user-dropdown');
            const tentangDropdown = document.getElementById('tentang-dropdown');
            if (tentangDropdown && !tentangDropdown.classList.contains('hidden')) tentangDropdown.classList.add('hidden');
            dropdown.classList.toggle('hidden');
        }

        window.onclick = function(event) {
            if (!event.target.closest('#user-menu-button')) {
                const userDropdown = document.getElementById('user-dropdown');
                if (userDropdown && !userDropdown.classList.contains('hidden')) userDropdown.classList.add('hidden');
            }
            if (!event.target.closest('#tentang-button')) {
                const tentangDropdown = document.getElementById('tentang-dropdown');
                if (tentangDropdown && !tentangDropdown.classList.contains('hidden')) tentangDropdown.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            var themeToggleBtn = document.getElementById('theme-toggle');

            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                themeToggleLightIcon.classList.remove('hidden');
                themeToggleDarkIcon.classList.add('hidden');
                document.documentElement.classList.add('dark');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
                themeToggleLightIcon.classList.add('hidden');
                document.documentElement.classList.remove('dark');
            }

            themeToggleBtn.addEventListener('click', function() {
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
            });
        });
    </script>
</nav>