<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Akun - Admin Panel</title>

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
                <button onclick="toggleSidebar()" class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h1 class="text-xl font-bold text-gray-800 dark:text-white">Verifikasi Akun User</h1>
                
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

                @if (session('success'))
                    <div id="alert-success" class="flex items-center justify-between p-4 mb-4 text-green-800 rounded-lg bg-green-100 dark:bg-green-900/50 dark:text-green-300" role="alert">
                        <div class="flex items-center">
                            <span class="font-bold mr-2">Sukses!</span> {{ session('success') }}
                        </div>
                        <button onclick="document.getElementById('alert-success').style.display='none'" class="text-green-600 hover:bg-green-200 p-1 rounded">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
                        </button>
                    </div>
                @endif

                 @if (session('error'))
                    <div id="alert-error" class="flex items-center justify-between p-4 mb-4 text-red-800 rounded-lg bg-red-100 dark:bg-red-900/50 dark:text-red-300" role="alert">
                        <div class="flex items-center">
                            <span class="font-bold mr-2">Error!</span> {{ session('error') }}
                        </div>
                        <button onclick="document.getElementById('alert-error').style.display='none'" class="text-red-600 hover:bg-red-200 p-1 rounded">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
                        </button>
                    </div>
                @endif

                <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <form method="GET" action="{{ route('admin.verifikasi_akun') }}" class="relative w-full max-w-md">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" autocomplete="off"
                               class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-campus-600 focus:ring-campus-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400" 
                               placeholder="Cari nama atau email...">
                        <button type="submit" class="absolute bottom-2.5 right-2.5 rounded-lg bg-campus-600 px-4 py-1 text-sm font-medium text-white hover:bg-campus-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Cari</button>
                    </form>
                </div>

                <div class="rounded-lg bg-white shadow dark:bg-gray-800 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">User Info</th>
                                    <th scope="col" class="px-6 py-3">Role</th>
                                    <th scope="col" class="px-6 py-3">Tanggal Daftar</th>
                                    <th scope="col" class="px-6 py-3">Status Verifikasi</th>
                                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($users as $user)
                                <tr class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 flex items-center gap-3">
                                        <img class="h-10 w-10 rounded-full object-cover border border-gray-200 dark:border-gray-600" 
                                             src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/user.png') }}" alt="User">
                                        <div>
                                            <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $user->name }}</div>
                                            <div class="text-xs font-normal text-gray-500">{{ $user->email }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-300' : 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($user->status_verifikasi == 'verified')
                                            <span class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-300">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                Terverifikasi
                                            </span>
                                        @elseif($user->status_verifikasi == 'rejected')
                                            <span class="inline-flex items-center rounded-md bg-red-100 px-2 py-1 text-xs font-medium text-red-700 dark:bg-red-900/30 dark:text-red-300">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                Ditolak
                                            </span>
                                        @else
                                            <span class="inline-flex items-center rounded-md bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300">
                                                Belum Verifikasi
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if($user->status_verifikasi == 'pending')
                                            <div class="flex items-center justify-center gap-2">
                                                <button onclick="openConfirmModal('{{ route('admin.verifikasi.approve', $user->id) }}', '{{ $user->name }}', 'verify')" 
                                                        class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors">
                                                    Verifikasi
                                                </button>

                                                <button onclick="openConfirmModal('{{ route('admin.verifikasi.reject', $user->id) }}', '{{ $user->name }}', 'reject')" 
                                                        class="inline-flex items-center px-3 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-medium rounded-lg transition-colors">
                                                    Tolak
                                                </button>
                                            </div>

                                        @elseif($user->status_verifikasi == 'rejected')
                                            <div class="flex flex-col gap-1 items-center">
                                                <span class="text-red-500 italic text-[10px] mb-1">Akses Diblokir</span>
                                                <button onclick="openConfirmModal('{{ route('admin.verifikasi_akun.delete', $user->id) }}', '{{ $user->name }}', 'delete')" 
                                                        class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded-lg transition-colors">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    Hapus Akun
                                                </button>
                                            </div>
                                        @else
                                            <span class="text-green-600 italic text-xs">Selesai</span>
                                        @endif

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                        Tidak ada user yang sesuai.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                        {{ $users->links() }} 
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div id="confirmModal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg dark:bg-gray-800">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 dark:bg-gray-800">
                        <div class="sm:flex sm:items-start">
                            <div id="modalIconContainer" class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full sm:mx-0 sm:h-10 sm:w-10">
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-white" id="modalTitle">Judul Modal</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-400" id="modalMessage">Pesan Modal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 dark:bg-gray-700/50">
                        <form id="confirmForm" action="" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="formMethod" value="PATCH">
                            
                            <button type="submit" id="confirmButton" class="inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto">
                                Konfirmasi
                            </button>
                        </form>
                        <button type="button" onclick="closeConfirmModal()" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto dark:bg-gray-700 dark:text-gray-300 dark:ring-gray-600 dark:hover:bg-gray-600">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }
        function toggleAdminUserDropdown() {
            const dropdown = document.getElementById('admin-user-dropdown');
            dropdown.classList.toggle('hidden');
        }
        window.onclick = function(event) {
            if (!event.target.closest('#admin-user-menu-button')) {
                const dropdown = document.getElementById('admin-user-dropdown');
                if (dropdown && !dropdown.classList.contains('hidden')) dropdown.classList.add('hidden');
            }
            if (event.target == document.querySelector('#confirmModal .fixed.inset-0')) {
                closeConfirmModal();
            }
        }

        function openConfirmModal(url, name, type) {
            const modal = document.getElementById('confirmModal');
            const form = document.getElementById('confirmForm');
            const formMethod = document.getElementById('formMethod');
            const title = document.getElementById('modalTitle');
            const message = document.getElementById('modalMessage');
            const iconContainer = document.getElementById('modalIconContainer');
            const confirmButton = document.getElementById('confirmButton');
            
            form.action = url;

            if (type === 'verify') {
                formMethod.value = 'PATCH'; 
                title.innerText = 'Verifikasi Akun';
                message.innerHTML = `Apakah Anda yakin ingin memverifikasi akun milik <b>${name}</b> secara manual?`;
                
                iconContainer.className = "mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10 dark:bg-blue-900/30";
                iconContainer.innerHTML = `<svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
                
                confirmButton.innerText = "Ya, Verifikasi";
                confirmButton.className = "inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto";

            } else if (type === 'reject') {
                formMethod.value = 'PATCH'; 
                title.innerText = 'Tolak Verifikasi';
                message.innerHTML = `Apakah Anda yakin ingin <b>menolak</b> akun milik <b>${name}</b>? User tidak akan bisa login.`;
                
                iconContainer.className = "mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10 dark:bg-yellow-900/30";
                iconContainer.innerHTML = `<svg class="h-6 w-6 text-yellow-600 dark:text-yellow-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg>`;
                
                confirmButton.innerText = "Ya, Tolak";
                confirmButton.className = "inline-flex w-full justify-center rounded-md bg-yellow-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 sm:ml-3 sm:w-auto";
            
            } else if (type === 'delete') {
                formMethod.value = 'DELETE';
                title.innerText = 'Hapus Akun Permanen';
                message.innerHTML = `Apakah Anda yakin ingin <b>MENGHAPUS PERMANEN</b> akun milik <b>${name}</b>? <br><span class="text-red-500 font-bold">Data tidak bisa dikembalikan. Email user akan bisa didaftarkan kembali.</span>`;

                iconContainer.className = "mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10 dark:bg-red-900/30";
                iconContainer.innerHTML = `<svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>`;

                confirmButton.innerText = "Hapus Permanen";
                confirmButton.className = "inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto";
            }

            modal.classList.remove('hidden');
        }

        function closeConfirmModal() {
            document.getElementById('confirmModal').classList.add('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
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
    </script>
</body>
</html>