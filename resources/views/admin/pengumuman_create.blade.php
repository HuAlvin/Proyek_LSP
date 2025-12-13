<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pengumuman - Admin Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

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
    
    <style>
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
        input[type=number] { -moz-appearance: textfield; }
        
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-down { animation: fadeInDown 0.3s ease-out forwards; }

        .ck-editor__editable_inline { min-height: 150px; }
        .dark .ck-editor__editable { background-color: #374151 !important; color: #e5e7eb !important; }
        .dark .ck-toolbar { background-color: #1f2937 !important; border-color: #374151 !important; }
        .dark .ck-button { color: #e5e7eb !important; }
        .dark .ck-button:hover { background-color: #374151 !important; }

        .ck-content ol, .ck-editor__editable ol {
            list-style-type: decimal !important;
            margin-left: 1.5rem !important;
            padding-left: 1.5rem !important;
        }
        
        .ck-content ul, .ck-editor__editable ul {
            list-style-type: disc !important;
            margin-left: 1.5rem !important;
            padding-left: 1.5rem !important;
        }
    </style>

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

        <div class="flex h-full flex-1 flex-col relative">
            
            <header class="flex h-16 shrink-0 items-center justify-between border-b border-gray-200 bg-white px-6 dark:bg-gray-800 dark:border-gray-700 z-10">
                <button onclick="toggleSidebar()" class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h1 class="text-xl font-bold text-gray-800 dark:text-white">Tambah Pengumuman</h1>
                
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
                                <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">Profile Settings</a></li>
                                <li><form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 font-semibold">Log Out</button></form></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                <div class="max-w-4xl mx-auto">
                    <div class="rounded-lg bg-white p-8 shadow dark:bg-gray-800">
                        
                        <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-6">
                                <label for="judul" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Judul Pengumuman</label>
                                <input type="text" name="judul" id="judul" required placeholder="Contoh: Jadwal Ujian Semester Ganjil"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-campus-600 focus:ring-campus-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="kategori" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                    <select name="kategori" id="kategori" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-campus-600 focus:ring-campus-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                            <option value="Akademik">Akademik</option>
                                            <option value="Kemahasiswaan">Kemahasiswaan</option>
                                            <option value="Berita">Berita Kampus</option>
                                            <option value="Beasiswa">Beasiswa</option>
                                            <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                                    <input type="text" name="tags" placeholder="Contoh: ujian, penting, 2025" 
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-campus-600 focus:ring-campus-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Pisahkan dengan tanda koma (,)</p>
                                </div>
                            </div>

                            <div class="grid gap-6 mb-4 md:grid-cols-2">
                                <div>
                                    <label for="tgl_publish" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal Publish</label>
                                    <input type="date" name="tgl_publish" id="tgl_publish" 
                                            value="{{ date('Y-m-d') }}" readonly
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-100 p-2.5 text-sm text-gray-500 cursor-not-allowed focus:border-gray-300 focus:ring-0 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400">
                                </div>
                                <div>
                                    <label for="status" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select name="status" id="status" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-campus-600 focus:ring-campus-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                            <option value="aktif">Aktif (Tampilkan)</option>
                                            <option value="arsip">Arsip (Sembunyikan)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-6 flex items-center p-4 border border-blue-100 bg-blue-50 rounded-lg dark:bg-blue-900/20 dark:border-blue-800">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_hidden" value="1" class="sr-only peer">
                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-campus-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Sembunyikan Identitas Penulis 
                                        <span class="block text-xs text-gray-500 dark:text-gray-400 font-normal">
                                            Jika aktif, nama penulis akan ditampilkan sebagai "Admin" di halaman publik.
                                        </span>
                                    </span>
                                </label>
                            </div>

                            <div class="mb-8 pb-6 border-b border-gray-200 dark:border-gray-700">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Thumbnail Utama</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="thumbnail" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 transition-all group overflow-hidden relative">
                                            <div id="upload-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-10 h-10 mb-3 text-gray-400 group-hover:text-campus-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik upload</span> Thumbnail</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">JPG, PNG (Max. 2MB)</p>
                                            </div>
                                            <img id="thumbnail-preview" class="hidden absolute w-full h-full object-contain p-2" src="#" alt="Preview">
                                            <input id="thumbnail" name="thumbnail" type="file" class="hidden" accept="image/*" onchange="previewImage(event, 'thumbnail-preview', 'upload-placeholder')" />
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h3 class="text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide mb-4 border-b pb-2 border-gray-200 dark:border-gray-700">Isi Konten</h3>
                                <div id="dynamic-content-area" class="space-y-6"></div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-8">
                                <button type="button" onclick="addTextSection()" 
                                            class="flex items-center justify-center gap-2 rounded-lg border-2 border-dashed border-gray-300 p-4 text-gray-500 hover:border-campus-600 hover:text-campus-600 hover:bg-blue-50 dark:border-gray-600 dark:hover:border-blue-400 dark:hover:bg-gray-700 dark:text-gray-400 transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    + Tambah Teks (Editor)
                                </button>
                                <button type="button" onclick="addImageSection()" 
                                            class="flex items-center justify-center gap-2 rounded-lg border-2 border-dashed border-gray-300 p-4 text-gray-500 hover:border-campus-600 hover:text-campus-600 hover:bg-blue-50 dark:border-gray-600 dark:hover:border-blue-400 dark:hover:bg-gray-700 dark:text-gray-400 transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    + Tambah Gambar
                                </button>
                            </div>

                            <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                                <a href="{{ route('admin.pengumuman.index') }}" 
                                   class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
                                    Batal
                                </a>
                                <button type="submit" 
                                            class="rounded-lg bg-campus-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-campus-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700">
                                    Simpan Pengumuman
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() { document.getElementById('sidebar').classList.toggle('-translate-x-full'); }
        function toggleAdminUserDropdown() { document.getElementById('admin-user-dropdown').classList.toggle('hidden'); }
        window.onclick = function(event) {
            if (!event.target.closest('#admin-user-menu-button')) {
                const dropdown = document.getElementById('admin-user-dropdown');
                if (dropdown && !dropdown.classList.contains('hidden')) dropdown.classList.add('hidden');
            }
        }
        // Dark Mode Logic
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

        function previewImage(event, previewId, placeholderId) {
            const input = event.target;
            const preview = document.getElementById(previewId);
            const placeholder = document.getElementById(placeholderId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if(placeholder) placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewDynamicImage(event) {
            const input = event.target;
            const wrapper = input.closest('label');
            const preview = wrapper.querySelector('.dynamic-preview');
            const placeholder = wrapper.querySelector('.dynamic-placeholder');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        let contentIndex = 0;
        const container = document.getElementById('dynamic-content-area');

        function addTextSection() {
            contentIndex++;
            const editorId = 'editor-' + contentIndex;
            const html = `
                <div class="content-item relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm animate-fade-in-down">
                    <input type="hidden" name="content[${contentIndex}][type]" value="text">
                    <div class="flex justify-between items-center mb-4 border-b border-gray-100 dark:border-gray-700 pb-2">
                        <label class="text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg> Paragraf Teks (Editor)
                        </label>
                        <button type="button" onclick="this.closest('.content-item').remove()" class="text-red-500 hover:text-red-700 p-1.5 rounded hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Hapus"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                    </div>
                    <textarea id="${editorId}" name="content[${contentIndex}][text]" rows="4" placeholder="Tuliskan paragraf..." class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:bg-gray-700 dark:text-white"></textarea>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            ClassicEditor.create(document.querySelector(`#${editorId}`), { toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ] }).catch(error => { console.error(error); });
        }

        function addImageSection() {
            contentIndex++;
            const html = `
                <div class="content-item relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-sm animate-fade-in-down">
                    <input type="hidden" name="content[${contentIndex}][type]" value="image">
                    <div class="flex justify-between items-center mb-4 border-b border-gray-100 dark:border-gray-700 pb-2">
                        <label class="text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> Gambar Tambahan
                        </label>
                        <button type="button" onclick="this.closest('.content-item').remove()" class="text-red-500 hover:text-red-700 p-1.5 rounded hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Hapus"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                    </div>
                    <div class="flex items-center justify-center w-full mb-4">
                        <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-700 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-500 dark:hover:border-gray-400 transition-all relative overflow-hidden">
                            <div class="dynamic-placeholder flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Klik untuk upload gambar</p>
                            </div>
                            <img class="dynamic-preview hidden absolute w-full h-full object-contain p-1" src="#" alt="Preview">
                            <input name="content[${contentIndex}][file]" type="file" class="hidden" accept="image/*" onchange="previewDynamicImage(event)" />
                        </label>
                    </div>
                    <div class="w-full text-left">
                        <label class="mb-1 block text-xs font-medium text-gray-500 dark:text-gray-400 text-left">Sumber Gambar / Caption (Opsional)</label>
                        <input type="text" name="content[${contentIndex}][caption]" placeholder="Contoh: Dokumentasi Kampus / Unsplash" class="block w-full text-left rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-campus-600 focus:ring-campus-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }
    </script>
</body>
</html>