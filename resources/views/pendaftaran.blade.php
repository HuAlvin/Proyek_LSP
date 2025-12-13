<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Pendaftaran - Kampus LSP</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: { colors: { campus: { 600: '#2563eb', 800: '#1e40af' } } }
            }
        }
    </script>
    <style>
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
        input[type=number] { -moz-appearance: textfield; }
        input[type="date"] { cursor: pointer; }
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
        .dark .custom-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
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

<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased transition-colors duration-300">

    @include('layouts.navbar')

    <div class="pt-24 pb-12 px-4">
        <div class="max-w-4xl mx-auto">

            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Formulir Pendaftaran Mahasiswa Baru</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Silakan lengkapi data diri Anda dengan benar dan valid.</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="bg-gray-100 dark:bg-gray-700 h-2 w-full">
                    <div class="bg-campus-600 h-2 w-1/3 rounded-r-full"></div>
                </div>

                <div class="p-8">
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                            <p class="font-bold">Terdapat kesalahan pengisian:</p>
                            <ul class="mt-1 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <section>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2 mb-6 flex items-center gap-2">
                                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-campus-600 text-sm font-bold">1</span>
                                Data Pribadi Calon Mahasiswa
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                                           class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5 @error('name') border-red-500 @enderror">
                                    @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                                           class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5 @error('email') border-red-500 @enderror">
                                    @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Induk Kependudukan (NIK)</label>
                                    <input type="number" name="nik" id="nik" placeholder="16 digit NIK" value="{{ old('nik') }}" required 
                                           class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5 @error('nik') border-red-500 @enderror">
                                    @error('nik') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor WhatsApp / HP</label>
                                    <input type="number" name="phone" id="phone" placeholder="Contoh: 08123456789" value="{{ old('phone') }}" required 
                                           class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5 @error('phone') border-red-500 @enderror">
                                </div>

                                <div>
                                    <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required 
                                           class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5 @error('tempat_lahir') border-red-500 @enderror">
                                    @error('tempat_lahir') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" onclick="this.showPicker()" required 
                                           class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5 cursor-pointer">
                                </div>

                                <div>
                                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="custom-select bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                    <select name="agama" id="agama" class="custom-select bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5">
                                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Lengkap (Sesuai KTP)</label>
                                <textarea name="alamat" id="alamat" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-campus-600 focus:border-campus-600 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Nama Jalan, RT/RW, Kelurahan, Kecamatan...">{{ old('alamat') }}</textarea>
                                @error('alamat') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </section>

                        <section>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2 mb-6 flex items-center gap-2">
                                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-campus-600 text-sm font-bold">2</span>
                                Pilihan Program Studi
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="relative">
                                    <input type="radio" name="prodi" id="ti" value="Teknik Informatika" class="peer hidden" required {{ old('prodi') == 'Teknik Informatika' ? 'checked' : '' }}>
                                    <label for="ti" class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-campus-600 peer-checked:text-campus-600 hover:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">Teknik Informatika</div>
                                            <div class="w-full text-sm">S1 - Sarjana Komputer</div>
                                        </div>
                                        <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" /></svg>
                                    </label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="prodi" id="si" value="Sistem Informasi" class="peer hidden" {{ old('prodi') == 'Sistem Informasi' ? 'checked' : '' }}>
                                    <label for="si" class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-campus-600 peer-checked:text-campus-600 hover:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">Sistem Informasi</div>
                                            <div class="w-full text-sm">S1 - Sarjana Komputer</div>
                                        </div>
                                        <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" /></svg>
                                    </label>
                                </div>
                                <div class="relative">
                                    <input type="radio" name="prodi" id="bd" value="Bisnis Digital" class="peer hidden" {{ old('prodi') == 'Bisnis Digital' ? 'checked' : '' }}>
                                    <label for="bd" class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-campus-600 peer-checked:text-campus-600 hover:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">Bisnis Digital</div>
                                            <div class="w-full text-sm">S1 - Sarjana Bisnis</div>
                                        </div>
                                        <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" /></svg>
                                    </label>
                                </div>
                            </div>
                        </section>

                        <section>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2 mb-6 flex items-center gap-2">
                                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-campus-600 text-sm font-bold">3</span>
                                Upload Berkas Persyaratan
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="w-full">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scan Ijazah / SKL</label>
                                    <div class="flex items-center justify-center w-full">
                                        <label for="ijazah" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 transition-all group @error('ijazah') border-red-500 @enderror">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-10 h-10 mb-3 text-gray-400 group-hover:text-campus-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik untuk upload</span> atau drag file ke sini</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">PDF, JPG, atau PNG (Maks. 2MB)</p>
                                                <p id="file-name-ijazah" class="mt-2 text-sm font-bold text-campus-600 dark:text-blue-400 text-center px-4 truncate w-full"></p>
                                            </div>
                                            <input id="ijazah" name="ijazah" type="file" class="hidden" accept=".pdf,.jpg,.jpeg,.png" onchange="updateFileName(this, 'file-name-ijazah')" required />
                                        </label>
                                    </div>
                                    @error('ijazah') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div class="w-full">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pas Foto Formal</label>
                                    <div class="flex items-center justify-center w-full">
                                        <label for="foto" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 transition-all group @error('foto') border-red-500 @enderror">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-10 h-10 mb-3 text-gray-400 group-hover:text-campus-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik untuk upload</span> pas foto</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">JPG atau PNG (Latar Merah/Biru, Maks. 1MB)</p>
                                                <p id="file-name-foto" class="mt-2 text-sm font-bold text-campus-600 dark:text-blue-400 text-center px-4 truncate w-full"></p>
                                            </div>
                                            <input id="foto" name="foto" type="file" class="hidden" accept=".jpg,.jpeg,.png" onchange="updateFileName(this, 'file-name-foto')" required />
                                        </label>
                                    </div>
                                    @error('foto') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </section>

                        <div class="pt-6 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-4">
                            <a href="{{ route('home') }}" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</a>
                            <button type="submit" class="text-white bg-campus-600 hover:bg-campus-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Kirim Pendaftaran
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 dark:bg-black text-white py-8 border-t border-gray-800 mt-auto">
        <div class="mx-auto max-w-screen-xl px-4 text-center">
            <span class="text-2xl font-bold block mb-2">Kampus LSP</span>
            <p class="text-gray-400 text-sm mb-4">Jl. Teknologi No. 12, Kota Digital, Indonesia</p>
            <span class="text-sm text-gray-500">© 2025 Kampus LSP. All Rights Reserved.</span>
        </div>
    </footer>

    <script>
        function updateFileName(input, textId) {
            const fileName = input.files[0]?.name;
            const textElement = document.getElementById(textId);
            if (fileName) {
                textElement.innerText = "File terpilih: " + fileName;
                textElement.classList.remove('hidden');
            } else {
                textElement.innerText = "";
            }
        }
    </script>
</body>
</html>