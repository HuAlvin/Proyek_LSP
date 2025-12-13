<aside id="sidebar" class="absolute z-20 h-full w-64 -translate-x-full transform bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transition-transform duration-300 lg:static lg:translate-x-0">
    
    <div class="flex h-16 items-center justify-center border-b border-gray-200 dark:border-gray-700">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-xl text-campus-800 dark:text-blue-400">
            <img src="{{ asset('images/logo.png') }}" class="h-8 w-8 rounded-full object-cover" alt="Logo">
            Kampus LSP
        </a>
    </div>

    <nav class="p-4 space-y-1 overflow-y-auto">
        <p class="px-2 text-xs font-semibold text-gray-400 uppercase">Menu Utama</p>
    
        <a href="{{ route('admin.verifikasi_akun') }}" class="flex items-center gap-3 rounded-lg px-4 py-2 {{ request()->routeIs('admin.verifikasi_akun') ? 'bg-campus-50 text-campus-600 dark:bg-gray-700 dark:text-white' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }} transition-colors">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Verifikasi Akun
        </a>

        <a href="{{ route('admin.pendaftar') }}" class="flex items-center gap-3 rounded-lg px-4 py-2 {{ request()->routeIs('admin.pendaftar') ? 'bg-campus-50 text-campus-600 dark:bg-gray-700 dark:text-white' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }} transition-colors">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            Data Pendaftar
        </a>

        <a href="{{ route('admin.pengumuman.index') }}" class="flex items-center gap-3 rounded-lg px-4 py-2 {{ request()->routeIs('admin.pengumuman') || request()->routeIs('admin.pengumuman.*') ? 'bg-campus-50 text-campus-600 dark:bg-gray-700 dark:text-white' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }} transition-colors">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
            Pengumuman
        </a>

        <p class="px-2 mt-6 text-xs font-semibold text-gray-400 uppercase">Pengaturan</p>

        <a href="{{ route('admin.users') }}" class="flex items-center gap-3 rounded-lg px-4 py-2 {{ request()->routeIs('admin.users') ? 'bg-campus-50 text-campus-600 dark:bg-gray-700 dark:text-white' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }} transition-colors">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            User Management
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center gap-3 rounded-lg px-4 py-2 text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/30 transition-colors">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </button>
        </form>
    </nav>
</aside>