<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pengguna - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        campus: { 600: '#2563eb', 700: '#1d4ed8' }
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

<body
    class="bg-gray-50 dark:bg-gray-900 min-h-screen flex flex-col font-sans antialiased transition-colors duration-300">

    @include('layouts.navbar')

    <main class="flex-1 p-6 mt-16">
        <div class="max-w-4xl mx-auto">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Edit Data Pengguna</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Ubah informasi profil, email, dan avatar
                        pengguna.</p>
                </div>
                <a href="{{ route('admin.verifikasi_akun') }}"
                    class="text-sm text-campus-600 dark:text-blue-400 hover:underline flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar
                </a>
            </div>

            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700 transition-colors duration-300">

                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
                    class="p-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                        <div class="col-span-1 flex flex-col items-center text-center space-y-4">
                            <div class="relative group">

                                <div
                                    class="w-40 h-40 rounded-full overflow-hidden border-4 border-gray-100 dark:border-gray-700 shadow-sm relative">
                                    <img id="avatar-preview"
                                        src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/user.png') }}"
                                        alt="Avatar Preview" class="w-full h-full object-cover">

                                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 cursor-pointer"
                                        onclick="document.getElementById('avatar-input').click()">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="avatar-input"
                                    class="cursor-pointer bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 py-2 px-4 rounded-lg text-sm font-medium hover:bg-gray-50 dark:hover:bg-gray-600 transition shadow-sm">
                                    Pilih Foto Baru
                                </label>
                                <input type="file" id="avatar-input" name="avatar" class="hidden" accept="image/*"
                                    onchange="previewImage(event)">
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">JPG, PNG, atau GIF. Maks 2MB.
                                </p>
                                @error('avatar')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="col-span-1 md:col-span-2 space-y-6">

                            <div
                                class="grid grid-cols-2 gap-4 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700/50">
                                <div>
                                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">User
                                        ID</span>
                                    <p class="text-sm font-mono text-gray-700 dark:text-gray-300">#{{ $user->id }}</p>
                                </div>
                                <div>
                                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Role Saat
                                        Ini</span>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 capitalize">
                                        {{ $user->role ?? 'User' }}
                                    </span>
                                </div>
                            </div>


                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Lengkap</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Nama pengguna" required>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>


                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                    Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="nama@email.com" required>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>


                            <div
                                class="flex items-center gap-4 pt-4 mt-4 border-t border-gray-100 dark:border-gray-700">
                                <button type="submit"
                                    class="text-white bg-campus-600 hover:bg-campus-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/30 transition-all">
                                    Simpan Perubahan
                                </button>
                                <a href="{{ route('admin.verifikasi_akun') }}"
                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 transition-all">
                                    Batal
                                </a>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function () {
                const dataURL = reader.result;
                const output = document.getElementById('avatar-preview');
                output.src = dataURL;
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>