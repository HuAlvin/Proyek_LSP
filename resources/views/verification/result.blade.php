<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Verifikasi - Kampus LSP</title>
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
        // Cek awal theme
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased transition-colors duration-300 flex flex-col min-h-screen">

    {{-- 1. NAVBAR --}}
    @include('layouts.navbar') 

    {{-- 2. MAIN CONTENT --}}
    <main class="flex-grow flex items-center justify-center p-4 pt-24 pb-24">
        
        {{-- CONTAINER GRID UTAMA (Max Width diperlebar untuk 2 kolom) --}}
        <div class="max-w-5xl w-full grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            
            {{-- === KOLOM KIRI: KARTU HASIL VERIFIKASI (KODE DOKUMEN) === --}}
            <div class="w-full bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700 relative z-10">
                {{-- Header Hijau --}}
                <div class="bg-green-600 p-6 text-center">
                    <svg class="w-16 h-16 text-white mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h1 class="text-2xl font-bold text-white">DOKUMEN TERDAFTAR</h1>
                    <p class="text-green-100 text-sm">Data ditemukan di database kampus.</p>
                </div>

                {{-- Konten Data --}}
                <div class="p-6 space-y-4">
                    <div>
                        <label class="text-xs text-gray-500 dark:text-gray-400 uppercase font-bold">Kode Dokumen</label>
                        <p class="text-xl font-mono font-bold text-gray-800 dark:text-white">{{ $receipt->verification_code }}</p>
                    </div>
                    
                    <div class="border-t border-gray-100 dark:border-gray-700 pt-4">
                        <div class="flex justify-between py-1">
                            <span class="text-gray-600 dark:text-gray-400 text-sm">Nama</span>
                            <span class="font-semibold text-sm text-gray-900 dark:text-gray-200">{{ $receipt->pendaftar->name }}</span>
                        </div>
                        <div class="flex justify-between py-1">
                            <span class="text-gray-600 dark:text-gray-400 text-sm">Nominal</span>
                            <span class="font-bold text-green-600 dark:text-green-400 text-sm">Rp {{ number_format($receipt->nominal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between py-1">
                            <span class="text-gray-600 dark:text-gray-400 text-sm">Tanggal</span>
                            <span class="font-semibold text-sm text-gray-900 dark:text-gray-200">{{ \Carbon\Carbon::parse($receipt->tanggal_terima)->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- === KOLOM KANAN: INPUT VALIDASI MANUAL SIGNATURE === --}}
            <div class="w-full bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 h-full">
                <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    Cek Forensik Digital Signature
                </h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-4">
                    Salin kode RSA panjang dari PDF (Ctrl+A di PDF), lalu tempel di sini untuk mencocokkan karakter per karakter.
                </p>

                <textarea id="manual_input" rows="8" 
                    class="w-full text-xs font-mono border rounded-lg p-3 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                    placeholder="Tempel (Paste) kode RSA panjang di sini..."></textarea>

                <button onclick="checkSignatureManual()" 
                    class="mt-4 w-full bg-purple-600 hover:bg-purple-700 text-white text-sm font-bold py-3 rounded-lg transition shadow-md flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Validasi Signature Manual
                </button>

                {{-- Area Hasil Validasi Manual --}}
                <div id="manual_result" class="hidden mt-4 p-3 rounded-lg text-sm font-semibold border"></div>
            </div>

        </div>

    </main>

    @include('layouts.footer')

    {{-- Floating Theme Button --}}
    <button id="floating-theme-toggle" type="button" class="fixed bottom-6 right-6 z-50 p-3 rounded-full shadow-lg bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-600">
        <svg id="floating-light-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
        <svg id="floating-dark-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
    </button>

    {{-- SCRIPT JAVASCRIPT VALIDASI --}}
    <script>
        // 1. Ambil Signature Asli dari Database
        const originalSignature = `{!! $receipt->digital_signature !!}`.replace(/\s/g, '');

        function checkSignatureManual() {
            const inputField = document.getElementById('manual_input');
            const resultBox = document.getElementById('manual_result');
            
            // Ambil input user dan bersihkan spasi
            const userInput = inputField.value.replace(/\s/g, '');

            resultBox.classList.remove('hidden', 'bg-green-100', 'text-green-700', 'border-green-300', 'bg-red-100', 'text-red-700', 'border-red-300');

            if (userInput === "") {
                resultBox.classList.add('hidden');
                return;
            }

            if (userInput === originalSignature) {
                // MATCH
                resultBox.innerHTML = "✅ COCOK! Kode Signature identik dengan database.";
                resultBox.classList.add('bg-green-100', 'text-green-700', 'border-green-300');
            } else {
                // NOT MATCH
                resultBox.innerHTML = "❌ TIDAK COCOK! Kode yang Anda masukkan berbeda.";
                resultBox.classList.add('bg-red-100', 'text-red-700', 'border-red-300');
            }
        }

        // --- Logic Dark Mode ---
        const themeBtn = document.getElementById('floating-theme-toggle');
        const darkIcon = document.getElementById('floating-dark-icon');
        const lightIcon = document.getElementById('floating-light-icon');

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            lightIcon.classList.remove('hidden');
        } else {
            darkIcon.classList.remove('hidden');
        }

        themeBtn.addEventListener('click', function() {
            darkIcon.classList.toggle('hidden');
            lightIcon.classList.toggle('hidden');
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