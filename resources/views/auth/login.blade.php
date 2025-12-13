<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - PMB Kampus LSP</title>

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
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                </div>
                <h2 class="text-4xl font-bold mb-4">Selamat Datang Kembali.</h2>
                <p class="text-lg text-gray-200 leading-relaxed">
                    "Pendidikan adalah tiket ke masa depan. Hari esok dimiliki oleh orang-orang yang mempersiapkannya hari ini."
                </p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
            <div class="max-w-md w-full">
                
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-gray-900">Masuk ke Akun</h2>
                    <p class="text-gray-500 mt-2">Masukkan email dan password Anda untuk melanjutkan.</p>
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Alamat Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
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

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-campus-600 border-gray-300 rounded focus:ring-campus-600">
                            <label for="remember_me" class="ml-2 text-sm text-gray-500">Ingat Saya</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-campus-600 hover:underline" href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="w-full text-white bg-campus-600 hover:bg-campus-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-3 text-center transition-all shadow-lg shadow-blue-500/30">
                        Masuk Dashboard
                    </button>

                    <p class="text-sm font-light text-gray-500 text-center">
                        Belum punya akun pendaftaran? 
                        <a href="{{ route('register') }}" class="font-medium text-campus-600 hover:underline">Daftar sekarang</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>