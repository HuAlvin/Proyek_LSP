<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaturan Profil - Kampus LSP</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        campus: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            600: '#2563eb', 
                            800: '#1e40af', 
                        }
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
<body class="antialiased font-sans text-gray-700 bg-gray-50 dark:bg-gray-900 dark:text-gray-200 transition-colors duration-300">

    @include('layouts.navbar')

    <div class="pt-24 pb-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="flex items-center justify-between mb-6 px-4 sm:px-0">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Pengaturan Profil</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Kelola informasi akun dan keamanan Anda.</p>
                </div>
            </div>

            @if (session('status') === 'profile-updated' || session('status') === 'password-updated')
                <div class="bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-200 p-4 rounded shadow-sm mx-4 sm:mx-0 mb-4" role="alert">
                    <p class="font-bold">Berhasil!</p>
                    <p>Perubahan data profil Anda telah disimpan.</p>
                </div>
            @endif
            
            @if ($errors->userDeletion->any())
                <div class="bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-700 dark:text-red-200 p-4 rounded shadow-sm mx-4 sm:mx-0 mb-4" role="alert">
                    <p class="font-bold">Gagal Menghapus Akun!</p>
                    <p>{{ $errors->userDeletion->first('password') }}</p>
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg transition-colors duration-300">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-white">Informasi Pribadi</h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Perbarui foto profil, nama lengkap, dan alamat email akun Anda.</p>
                    </header>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                <img id="preview-image" class="h-16 w-16 object-cover rounded-full border border-gray-300 dark:border-gray-600" 
                                     src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/user.png') }}" 
                                     alt="Current profile photo" />
                            </div>
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" name="avatar" onchange="previewImage(event)"
                                    class="block w-full text-sm text-gray-500 dark:text-gray-400
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-campus-50 file:text-campus-600
                                    hover:file:bg-campus-100
                                    dark:file:bg-gray-700 dark:file:text-gray-300
                                    cursor-pointer"
                                />
                                @error('avatar') <span class="text-red-600 text-sm block mt-2">{{ $message }}</span> @enderror
                            </label>
                        </div>

                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                                class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5">
                            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                                class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5">
                            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="text-white bg-campus-600 hover:bg-campus-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">Simpan Perubahan</button>
                        </div>
                    </form>
                </section>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg transition-colors duration-300">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-white">Update Password</h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Pastikan akun Anda aman dengan menggunakan password yang panjang dan acak.</p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Saat Ini</label>
                            <input type="password" name="current_password" id="current_password" autocomplete="current-password"
                                class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5">
                            @error('current_password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                            <input type="password" name="password" id="password" autocomplete="new-password"
                                class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5">
                            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password"
                                class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-2.5">
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="text-white bg-campus-600 hover:bg-campus-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">Ganti Password</button>
                        </div>
                    </form>
                </section>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg border-l-4 border-red-500 transition-colors duration-300">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-red-600 dark:text-red-400">Hapus Akun</h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Setelah akun dihapus, semua data akan hilang secara permanen. Harap unduh data penting sebelum menghapus.</p>
                    </header>
                    
                    <div class="mt-6">

                        <button onclick="openDeleteModal()" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none transition-colors">
                            Hapus Akun Saya
                        </button>
                    </div>
                </section>
            </div>

        </div>
    </div>

    <div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm" onclick="closeDeleteModal()"></div>

        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white dark:bg-gray-800 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg border dark:border-gray-700">
                
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="p-6 space-y-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                <h3 class="text-xl font-semibold leading-6 text-gray-900 dark:text-white" id="modal-title">Apakah Anda yakin?</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Akun yang dihapus tidak dapat dikembalikan. Silakan masukkan password Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun ini secara permanen.
                                    </p>
                                </div>

                                <div class="mt-4">
                                    <label for="delete_password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="delete_password" placeholder="Password Anda"
                                        class="bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required>
                                    @if($errors->userDeletion->has('password'))
                                        <span class="text-red-600 text-sm block mt-2">{{ $errors->userDeletion->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700/50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="submit" class="inline-flex w-full justify-center rounded-lg bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto transition-colors">
                            Ya, Hapus Akun
                        </button>
                        <button type="button" onclick="closeDeleteModal()" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white dark:bg-gray-800 px-3 py-2 text-sm font-semibold text-gray-900 dark:text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 sm:mt-0 sm:w-auto transition-colors">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('preview-image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        const modal = document.getElementById('deleteModal');
        const passwordInput = document.getElementById('delete_password');

        function openDeleteModal() {
            modal.classList.remove('hidden');

            setTimeout(() => {
                passwordInput.focus();
            }, 100);
        }

        function closeDeleteModal() {
            modal.classList.add('hidden');
            passwordInput.value = '';
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape" && !modal.classList.contains('hidden')) {
                closeDeleteModal();
            }
        });

        @if ($errors->userDeletion->any())
            openDeleteModal();
        @endif

    </script>
</body>
</html>