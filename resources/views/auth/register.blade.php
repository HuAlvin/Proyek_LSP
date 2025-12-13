<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun Baru - PMB Kampus LSP</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        campus: {
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased bg-white">

    <div class="min-h-screen flex">
        
        <div class="hidden lg:flex lg:w-1/2 relative bg-gray-900 justify-center items-center overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center" 
                 style="background-image: url('{{ asset('images/gedung.jpg') }}'); opacity: 0.4;">
            </div>
            
            <div class="relative z-10 p-12 text-white max-w-lg">
                <div class="mb-6 bg-campus-600 w-16 h-16 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h2 class="text-4xl font-bold mb-4">Mulai Perjalanan Akademik Anda Di Sini.</h2>
                <p class="text-lg text-gray-200 leading-relaxed">
                    "Bergabunglah dengan ribuan mahasiswa berprestasi dan jadilah bagian dari inovasi masa depan bersama Kampus LSP."
                </p>
                <div class="mt-8 flex gap-2">
                    <div class="w-12 h-1 bg-campus-600 rounded"></div>
                    <div class="w-4 h-1 bg-gray-500 rounded"></div>
                    <div class="w-4 h-1 bg-gray-500 rounded"></div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
            <div class="max-w-md w-full">
                
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-gray-900">Buat Akun Baru</h2>
                    <p class="text-gray-500 mt-2">Silakan isi data diri untuk mendaftar PMB.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-3 @error('name') border-red-500 @enderror" 
                            placeholder="Contoh: Budi Santoso">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Alamat Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-3 @error('email') border-red-500 @enderror" 
                            placeholder="nama@email.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-3 @error('password') border-red-500 @enderror" 
                            placeholder="••••••••">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-campus-600 focus:border-campus-600 block w-full p-3" 
                            placeholder="••••••••">
                    </div>

                    <button type="submit" class="w-full text-white bg-campus-600 hover:bg-campus-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-3 text-center transition-all shadow-lg shadow-blue-500/30">
                        Daftar Sekarang
                    </button>

                    <p class="text-sm font-light text-gray-500 text-center">
                        Sudah punya akun pendaftaran? 
                        <a href="{{ route('login') }}" class="font-medium text-campus-600 hover:underline">Masuk di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>