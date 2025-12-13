<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pendaftar - Admin Panel</title>

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
                    <h1 class="text-xl font-bold text-gray-800 dark:text-white">Edit Data: {{ $pendaftar->name }}</h1>
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
                                <li><form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 font-semibold">Log Out</button></form></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6">

                <div id="js-error-alert" class="hidden mb-6 rounded-lg bg-red-50 p-4 border-l-4 border-red-500 dark:bg-red-900/30 dark:border-red-600 transition-all">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800 dark:text-red-200">Perhatian: Data tidak valid!</h3>
                            <ul id="js-error-list" class="mt-2 list-disc list-inside text-sm text-red-700 dark:text-red-300">
                            </ul>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded-lg bg-red-50 p-4 border-l-4 border-red-500 dark:bg-red-900/30 dark:border-red-600" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800 dark:text-red-200">Terdapat kesalahan dari server:</h3>
                                <ul class="mt-2 list-disc list-inside text-sm text-red-700 dark:text-red-300">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form id="updateForm" action="{{ route('admin.pendaftar.update', $pendaftar->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="status" value="{{ $pendaftar->status }}">

                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        
                        <div class="lg:col-span-2 space-y-6">
                            
                            
                            <div class="rounded-lg bg-white p-6 shadow dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                                <h3 class="mb-5 text-lg font-semibold text-gray-900 dark:text-white border-b pb-3 dark:border-gray-700 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Informasi Pribadi
                                </h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    
                                    <div class="md:col-span-2">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap <span class="text-red-500">*</span></label>
                                        <input type="text" name="name" id="input-name" value="{{ old('name', $pendaftar->name) }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    </div>
                                    
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email <span class="text-red-500">*</span></label>
                                        <input type="email" name="email" id="input-email" value="{{ old('email', $pendaftar->email) }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    </div>
                                    
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIK (16 Digit) <span class="text-red-500">*</span></label>
                                        <input type="text" name="nik" id="input-nik" maxlength="16" value="{{ old('nik', $pendaftar->nik) }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="16 digit angka...">
                                    </div>
                                    
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir <span class="text-red-500">*</span></label>
                                        <input type="text" name="tempat_lahir" id="input-tempat" value="{{ old('tempat_lahir', $pendaftar->tempat_lahir) }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    </div>
                                    
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir <span class="text-red-500">*</span></label>
                                        <input type="date" name="tanggal_lahir" id="input-tanggal" value="{{ old('tanggal_lahir', $pendaftar->tanggal_lahir) }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                        <select name="gender" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            <option value="L" {{ old('gender', $pendaftar->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="P" {{ old('gender', $pendaftar->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                        <select name="agama" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'] as $agama)
                                                <option value="{{ $agama }}" {{ old('agama', $pendaftar->agama) == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">No. Telepon / WA <span class="text-red-500">*</span></label>
                                        <input type="text" name="phone" id="input-phone" value="{{ old('phone', $pendaftar->phone) }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat Lengkap <span class="text-red-500">*</span></label>
                                        <textarea name="alamat" id="input-alamat" rows="3" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('alamat', $pendaftar->alamat) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-lg bg-white p-6 shadow dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                                <h3 class="mb-5 text-lg font-semibold text-gray-900 dark:text-white border-b pb-3 dark:border-gray-700 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    Data Akademik & Dokumen
                                </h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="md:col-span-2">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Program Studi Pilihan</label>
                                        <select name="prodi" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            <option value="Teknik Informatika" {{ old('prodi', $pendaftar->prodi) == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                                            <option value="Sistem Informasi" {{ old('prodi', $pendaftar->prodi) == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                                            <option value="Bisnis Digital" {{ old('prodi', $pendaftar->prodi) == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
                                        </select>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Update File Ijazah</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="ijazah-input" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 transition-all group">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
                                                    <svg class="w-8 h-8 mb-3 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                    <p class="mb-1 text-sm text-gray-500 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-gray-200"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400" id="ijazah-filename">PDF, JPG, JPEG (Max. 2MB)</p>
                                                </div>
                                                <input id="ijazah-input" name="ijazah" type="file" class="hidden" onchange="updateFileName(this, 'ijazah-filename')" />
                                            </label>
                                        </div>
                                        @if($pendaftar->ijazah)
                                            <div class="mt-3 flex items-center gap-2 p-2 bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800 rounded-lg">
                                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">File saat ini:</p>
                                                    <p class="text-sm font-medium text-blue-700 dark:text-blue-300 truncate">{{ basename($pendaftar->ijazah) }}</p>
                                                </div>
                                                <a href="{{ asset('storage/' . $pendaftar->ijazah) }}" target="_blank" class="text-xs bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 px-3 py-1.5 rounded hover:bg-gray-50 dark:hover:bg-gray-700 transition">Lihat</a>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Update Pas Foto</label>
                                        <div class="flex items-start gap-4">
                                            <div class="flex-shrink-0">
                                                <div class="h-24 w-24 rounded-lg overflow-hidden border-2 border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700">
                                                    <img id="foto-preview" src="{{ $pendaftar->foto ? asset('storage/' . $pendaftar->foto) : asset('images/user.png') }}" class="h-full w-full object-cover">
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <label for="foto-input" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 transition-all group">
                                                    <div class="flex flex-col items-center justify-center pt-2 pb-3">
                                                        <svg class="w-6 h-6 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                        <p class="text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Ganti Foto</span></p>
                                                        <p class="text-xs text-gray-400" id="foto-filename">JPG/PNG</p>
                                                    </div>
                                                    <input id="foto-input" name="foto" type="file" class="hidden" accept="image/*" onchange="previewImage(this, 'foto-preview', 'foto-filename')" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">

                            <div class="rounded-lg bg-white p-6 shadow dark:bg-gray-800 border-t-4 border-yellow-500 relative">
                                <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white border-b pb-2 dark:border-gray-700 flex justify-between items-center">
                                    Bukti Pembayaran
                                    @if($pendaftar->pembayaran)
                                        @if($pendaftar->pembayaran->status == 'valid')
                                            <span class="text-[10px] bg-green-100 text-green-800 px-2 py-0.5 rounded-full font-bold">VALID</span>
                                        @elseif($pendaftar->pembayaran->status == 'invalid')
                                            <span class="text-[10px] bg-red-100 text-red-800 px-2 py-0.5 rounded-full font-bold">INVALID</span>
                                        @else
                                            <span class="text-[10px] bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full font-bold">PENDING</span>
                                        @endif
                                    @endif
                                </h3>

                                <div class="mb-4 bg-gray-50 dark:bg-gray-900 p-4 rounded-lg border border-gray-200 dark:border-gray-700 text-center relative group">
                                    <p class="text-xs text-gray-500 mb-2 dark:text-gray-400 absolute top-2 left-3 bg-white/80 dark:bg-black/50 px-2 py-0.5 rounded backdrop-blur-sm">Preview:</p>
                                    
                                    @if($pendaftar->pembayaran && $pendaftar->pembayaran->gambar)
                                        <img id="bukti-preview" src="{{ asset('storage/' . $pendaftar->pembayaran->gambar) }}" class="mx-auto max-h-48 rounded shadow-sm object-contain">
                                    @else
                                        <img id="bukti-preview" src="" class="mx-auto max-h-48 rounded shadow-sm object-contain hidden">
                                        <div id="bukti-placeholder" class="py-8 text-gray-400">
                                            <svg class="w-12 h-12 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            <span class="text-sm">Belum ada bukti</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="w-full">
                                    <label for="bukti-input" class="flex flex-col items-center justify-center w-full h-28 border-2 border-yellow-300 border-dashed rounded-lg cursor-pointer bg-yellow-50 dark:bg-yellow-900/10 hover:bg-yellow-100 dark:hover:bg-yellow-900/20 dark:border-yellow-600/50 transition-all group">
                                        <div class="flex flex-col items-center justify-center pt-3 pb-4">
                                            <svg class="w-8 h-8 mb-2 text-yellow-500 dark:text-yellow-400 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                            <p class="text-sm text-yellow-700 dark:text-yellow-400 font-medium">Upload Bukti Baru</p>
                                            <p class="text-xs text-yellow-600 dark:text-yellow-500/70" id="bukti-filename">Klik atau drag file ke sini</p>
                                        </div>
                                        <input id="bukti-input" name="bukti_pembayaran" type="file" class="hidden" accept="image/*" onchange="previewImage(this, 'bukti-preview', 'bukti-filename', 'bukti-placeholder')" />
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center gap-4 w-full md:w-auto">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center justify-center gap-2 w-full md:w-auto">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.pendaftar') }}" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 w-full md:w-auto text-center">
                                Batal
                            </a>
                        </div>

                        <button type="button" onclick="openDeleteModal()" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:focus:ring-red-900 flex items-center justify-center gap-2 w-full md:w-auto">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Hapus Pendaftar
                        </button>
                    </div>

                </form>
            </main>
        </div>
    </div>

    <div id="deleteModal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg dark:bg-gray-800">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 dark:bg-gray-800">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-white" id="modal-title">Hapus Data Pendaftar?</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Apakah Anda yakin ingin menghapus data <b>{{ $pendaftar->name }}</b>? <br>
                                        <span class="text-red-600 font-bold">Peringatan:</span> Tindakan ini akan menghapus akun user dan seluruh data yang terkait secara permanen. Data yang dihapus tidak dapat dikembalikan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 dark:bg-gray-700/50">
                        <form action="{{ route('admin.pendaftar.destroy', $pendaftar->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                Ya, Hapus Permanen
                            </button>
                        </form>
                        <button type="button" onclick="closeDeleteModal()" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto dark:bg-gray-700 dark:text-gray-300 dark:ring-gray-600 dark:hover:bg-gray-600">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() { document.getElementById('sidebar')?.classList.toggle('-translate-x-full'); }
        function toggleAdminUserDropdown() { document.getElementById('admin-user-dropdown').classList.toggle('hidden'); }

        function updateFileName(input, textId) {
            const textElement = document.getElementById(textId);
            if (input.files && input.files[0]) {
                textElement.innerText = "Terpilih: " + input.files[0].name;
                textElement.classList.add('text-blue-600', 'font-medium');
            }
        }

        function previewImage(input, previewId, textId, placeholderId = null) {
            const previewElement = document.getElementById(previewId);
            const textElement = document.getElementById(textId);
            const placeholderElement = placeholderId ? document.getElementById(placeholderId) : null;

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewElement.src = e.target.result;
                    previewElement.classList.remove('hidden');
                    if (placeholderElement) placeholderElement.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
                textElement.innerText = "Terpilih: " + input.files[0].name;
                textElement.classList.add('text-blue-600', 'font-medium');
            }
        }

        document.getElementById('updateForm').addEventListener('submit', function(e) {
            let errors = [];
            const nik = document.getElementById('input-nik').value.trim();
            const phone = document.getElementById('input-phone').value.trim();
            const email = document.getElementById('input-email').value.trim();
            const name = document.getElementById('input-name').value.trim();
            const tempat = document.getElementById('input-tempat').value.trim();
            const tanggal = document.getElementById('input-tanggal').value.trim();
            const alamat = document.getElementById('input-alamat').value.trim();

            if(!name || !email || !nik || !tempat || !tanggal || !alamat) {
                errors.push("Semua field bertanda bintang (*) wajib diisi.");
            }

            if (nik) {
                if (nik.length !== 16) {
                    errors.push("NIK harus berjumlah tepat 16 digit.");
                }
                if (isNaN(nik)) {
                    errors.push("NIK hanya boleh berisi angka.");
                }
            }

            if (phone) {
                if (phone.length < 10) {
                    errors.push("Nomor telepon minimal 10 digit.");
                }
                if (!/^\d+$/.test(phone)) {
                    errors.push("Nomor telepon hanya boleh berisi angka.");
                }
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email && !emailRegex.test(email)) {
                errors.push("Format email tidak valid.");
            }

            if (errors.length > 0) {
                e.preventDefault();

                const alertBox = document.getElementById('js-error-alert');
                const errorList = document.getElementById('js-error-list');

                errorList.innerHTML = '';
                errors.forEach(function(err) {
                    let li = document.createElement('li');
                    li.innerText = err;
                    errorList.appendChild(li);
                });

                alertBox.classList.remove('hidden');

                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });

        function openDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target == modal.querySelector('.fixed.inset-0.bg-gray-900')) {
                closeDeleteModal();
            }
        }

        const themeToggleBtn = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            lightIcon.classList.remove('hidden');
        } else {
            darkIcon.classList.remove('hidden');
        }
        themeToggleBtn.addEventListener('click', function() {
            darkIcon.classList.toggle('hidden');
            lightIcon.classList.toggle('hidden');
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