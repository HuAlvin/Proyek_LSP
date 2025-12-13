<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Pengumuman - Admin Panel</title>

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

<body class="bg-gray-50 dark:bg-gray-900 font-sans antialiased transition-colors duration-300">

    <div class="flex h-screen overflow-hidden">

        @include('layouts.navbar_admin')

        <div class="flex h-full flex-1 flex-col overflow-y-auto">

            <header
                class="flex h-16 items-center justify-between border-b border-gray-200 bg-white px-6 dark:bg-gray-800 dark:border-gray-700">
                <button onclick="toggleSidebar()"
                    class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <h1 class="text-xl font-bold text-gray-800 dark:text-white">Kelola Pengumuman</h1>

                <div class="flex items-center gap-4">

                    <button id="theme-toggle"
                        class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        <svg id="theme-toggle-dark-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden h-5 w-5" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <div class="h-8 w-px bg-gray-300 dark:bg-gray-600 hidden md:block"></div>

                    <div class="relative ml-2">
                        <button onclick="toggleAdminUserDropdown()" id="admin-user-menu-button"
                            class="flex items-center gap-2 rounded-full bg-gray-100 p-1 pr-3 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600 transition-all">
                            <img class="h-8 w-8 rounded-full object-cover border border-gray-300 dark:border-gray-500"
                                src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('images/user.png') }}"
                                alt="Avatar">
                            <span
                                class="hidden text-sm font-medium text-gray-700 dark:text-gray-200 md:block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500 hidden md:block" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div id="admin-user-dropdown"
                            class="absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-800 dark:ring-gray-700 hidden z-50 divide-y divide-gray-100 dark:divide-gray-700">
                            <div class="px-4 py-3">
                                <p class="text-sm text-gray-900 dark:text-white font-bold">{{ Auth::user()->name }}</p>
                                <p class="text-sm font-medium text-gray-500 truncate dark:text-gray-400">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                            <ul class="py-1">
                                <li><a href="{{ route('admin.dashboard') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">Dashboard</a>
                                </li>
                                <li><a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">Profile
                                        Settings</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit"
                                            class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 font-semibold">Log
                                            Out</button></form>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </header>

            <main class="flex-1 p-6">

                @if (session('success'))
                    <div id="alert-success"
                        class="flex items-center justify-between p-4 mb-4 text-green-800 rounded-lg bg-green-100 dark:bg-green-900/50 dark:text-green-300"
                        role="alert">
                        <div class="flex items-center">
                            <span class="font-bold mr-2">Sukses!</span> {{ session('success') }}
                        </div>
                        <button onclick="closeAlert('alert-success')" class="text-green-600 hover:bg-green-200 p-1 rounded">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <form method="GET" action="#" class="relative w-full max-w-md">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" autocomplete="off"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-campus-600 focus:ring-campus-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                            placeholder="Cari judul pengumuman...">
                    </form>

                    <a href="{{ route('admin.pengumuman.create') }}"
                        class="flex items-center justify-center gap-2 rounded-lg bg-campus-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-campus-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Tambah Pengumuman
                    </a>
                </div>

                <div class="rounded-lg bg-white shadow dark:bg-gray-800 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead
                                class="bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Judul Pengumuman</th>

                                    
                                    <th scope="col" class="px-6 py-3">Penulis</th>

                                    <th scope="col" class="px-6 py-3">Tanggal Upload</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($pengumuman as $item)
                                    <tr
                                        class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 transition-colors">

                                        
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                
                                                @if($item->gambar)
                                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                                        class="h-10 w-10 rounded object-cover flex-shrink-0" alt="Thumb">
                                                @else
                                                    <div
                                                        class="h-10 w-10 rounded bg-gray-200 flex items-center justify-center text-gray-400 dark:bg-gray-700">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                @endif

                                                <div class="flex flex-col">
                                                    <span class="font-medium text-gray-900 dark:text-white line-clamp-1">
                                                        {{ $item->judul }}
                                                    </span>

                                                    @php
                                                        $deskripsiJson = json_decode($item->deskripsi, true);
                                                        $previewText = 'Tidak ada teks preview';
                                                        if (is_array($deskripsiJson)) {
                                                            foreach ($deskripsiJson as $block) {
                                                                if (isset($block['type']) && $block['type'] === 'text') {
                                                                    $previewText = strip_tags($block['text']);
                                                                    break;
                                                                }
                                                            }
                                                        }
                                                    @endphp
                                                    <span
                                                        class="text-xs text-gray-500 font-normal mt-0.5 line-clamp-1 max-w-xs dark:text-gray-400">
                                                        {{ Str::limit($previewText, 60) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                
                                                <img class="h-8 w-8 rounded-full object-cover border border-gray-200 dark:border-gray-600"
                                                    src="{{ $item->user && $item->user->avatar ? asset('storage/' . $item->user->avatar) : asset('images/user.png') }}"
                                                    alt="Avatar">

                                                
                                                <div class="flex flex-col">
                                                    <span
                                                        class="text-sm font-medium text-gray-900 dark:text-white flex items-center gap-2">
                                                        
                                                        {{ $item->user->name ?? 'User Terhapus' }}

                                                        
                                                        @if($item->is_hidden)
                                                            <span
                                                                class="bg-gray-100 text-gray-600 text-[10px] font-bold px-1.5 py-0.5 rounded border border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                                                title="Identitas disembunyikan di publik">
                                                                HIDDEN
                                                            </span>
                                                        @endif
                                                    </span>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">
                                                        {{ $item->user->email ?? '-' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                            {{ \Carbon\Carbon::parse($item->tgl_publish)->translatedFormat('d M Y') }}
                                        </td>

                                        <td class="px-6 py-4">
                                            @if($item->status == 'aktif')
                                                <span
                                                    class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-300">
                                                    Aktif
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600 dark:bg-gray-700 dark:text-gray-400">
                                                    Arsip
                                                </span>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4 text-center">
                                            <div class="flex items-center justify-center gap-3">
                                                <a href="{{ route('admin.pengumuman.edit', $item->id) }}"
                                                    class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                                    Edit
                                                </a>

                                                <button type="button"
                                                    onclick="openDeleteModal('{{ route('admin.pengumuman.destroy', $item->id) }}')"
                                                    class="font-medium text-red-600 hover:underline dark:text-red-500 bg-transparent border-0 cursor-pointer">
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <p>Belum ada data pengumuman.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div
                        class="border-t border-gray-200 bg-white px-4 py-3 sm:px-6 dark:bg-gray-800 dark:border-gray-700">
                        {{ $pengumuman->withQueryString()->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- MODAL HAPUS --}}
    <div id="deleteModal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity backdrop-blur-sm"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg dark:bg-gray-800">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 dark:bg-gray-800">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10 dark:bg-red-900/30">
                                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-white"
                                    id="modal-title">Konfirmasi Hapus</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Apakah Anda yakin ingin
                                        menghapus pengumuman ini? Tindakan ini tidak dapat dibatalkan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 dark:bg-gray-700/50">
                        <form id="deleteForm" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Hapus
                                Data</button>
                        </form>
                        <button type="button" onclick="closeDeleteModal()"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto dark:bg-gray-700 dark:text-gray-300 dark:ring-gray-600 dark:hover:bg-gray-600">Batal</button>
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

        function closeAlert(id) {
            document.getElementById(id).style.display = 'none';
        }

        // --- FUNGSI MODAL DELETE ---
        function openDeleteModal(actionUrl) {
            document.getElementById('deleteForm').action = actionUrl;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Menutup modal dan dropdown jika user klik di luar kotak
        window.onclick = function (event) {
            // Close Modal Delete
            const modal = document.getElementById('deleteModal');
            if (event.target == modal.querySelector('.fixed.inset-0.bg-gray-900')) {
                closeDeleteModal();
            }

            // Close Admin User Dropdown
            if (!event.target.closest('#admin-user-menu-button')) {
                const dropdown = document.getElementById('admin-user-dropdown');
                if (dropdown && !dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        }

        // --- DARK MODE LOGIC ---
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function () {
            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                // if NOT set via local storage previously
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