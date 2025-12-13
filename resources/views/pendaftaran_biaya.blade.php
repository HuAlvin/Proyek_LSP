<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran Administrasi - Kampus LSP</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
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

<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans antialiased transition-colors duration-300">

    @include('layouts.navbar')

    <div class="pt-24 pb-12 px-4">
        <div class="max-w-3xl mx-auto">

            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Pembayaran Administrasi</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Lakukan pembayaran untuk menyelesaikan proses pendaftaran.</p>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <div>
                        <p class="font-bold">Langkah 1 Berhasil!</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden">

                <div class="bg-gray-100 dark:bg-gray-700 h-2 w-full">
                    <div class="bg-campus-600 h-2 w-2/3 rounded-r-full transition-all duration-1000 ease-out"></div>
                </div>

                <div class="p-8">

                    <div class="mb-8 p-6 bg-blue-50 dark:bg-blue-900/20 rounded-xl border border-blue-100 dark:border-blue-800">
                        <h3 class="text-lg font-bold text-blue-800 dark:text-blue-300 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            Rekening Tujuan Transfer
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Nama Bank</p>
                                <p class="text-lg font-bold text-gray-900 dark:text-white">Bank Rakyat Indonesia (BRI)</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Nomor Rekening</p>
                                <p class="text-xl font-mono font-bold text-campus-600 dark:text-blue-400">1234-5678-9012-3456</p>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-sm text-gray-500 dark:text-gray-400">Atas Nama</p>
                                <p class="font-medium text-gray-900 dark:text-white">Yayasan Pendidikan Kampus LSP</p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('pendaftaran.biaya.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <section>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2 mb-6 flex items-center gap-2">
                                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-campus-600 text-sm font-bold">2</span>
                                Rincian Biaya & Bukti Bayar
                            </h2>

                            <div class="space-y-6">

                                <div>
                                    <label class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">Biaya Pendaftaran Program Studi</label>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        
                                        <div class="border rounded-lg p-4 cursor-pointer hover:border-campus-600 dark:border-gray-600 dark:hover:border-blue-500 transition-colors bg-gray-50 dark:bg-gray-700/50">
                                            <div class="font-semibold text-gray-900 dark:text-white mb-1">Teknik Informatika</div>
                                            <div class="text-2xl font-bold text-campus-600 dark:text-blue-400">Rp 350.000</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Biaya Formulir & Tes</div>
                                        </div>

                                        <div class="border rounded-lg p-4 cursor-pointer hover:border-campus-600 dark:border-gray-600 dark:hover:border-blue-500 transition-colors bg-gray-50 dark:bg-gray-700/50">
                                            <div class="font-semibold text-gray-900 dark:text-white mb-1">Sistem Informasi</div>
                                            <div class="text-2xl font-bold text-campus-600 dark:text-blue-400">Rp 300.000</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Biaya Formulir & Tes</div>
                                        </div>

                                        <div class="border rounded-lg p-4 cursor-pointer hover:border-campus-600 dark:border-gray-600 dark:hover:border-blue-500 transition-colors bg-gray-50 dark:bg-gray-700/50">
                                            <div class="font-semibold text-gray-900 dark:text-white mb-1">Bisnis Digital</div>
                                            <div class="text-2xl font-bold text-campus-600 dark:text-blue-400">Rp 300.000</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Biaya Formulir & Tes</div>
                                        </div>

                                    </div>
                                    <p class="mt-2 text-xs text-red-500">*Silakan transfer nominal sesuai dengan Program Studi yang Anda pilih sebelumnya.</p>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Bukti Transfer</label>
                                    <div class="flex items-center justify-center w-full">
                                        <label for="bukti_pembayaran" class="flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 transition-all group @error('bukti_pembayaran') border-red-500 @enderror">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-12 h-12 mb-3 text-gray-400 group-hover:text-campus-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik upload</span> struk transfer / screenshot</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">JPG, JPEG, PNG (Maks. 2MB)</p>
                                                <p id="file-name-bukti" class="mt-2 text-sm font-bold text-campus-600 dark:text-blue-400 text-center px-4 truncate w-full"></p>
                                            </div>
                                            <input id="bukti_pembayaran" name="bukti_pembayaran" type="file" class="hidden" accept=".jpg,.jpeg,.png" onchange="updateFileName(this, 'file-name-bukti')" required />
                                        </label>
                                    </div>
                                    @error('bukti_pembayaran') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                            </div>
                        </section>

                        <div class="pt-6 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-4">
                            <a href="#" onclick="history.back()" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 flex items-center">
                                <svg class="w-3.5 h-3.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                Kembali
                            </a>

                            <button type="submit" class="text-white bg-campus-600 hover:bg-campus-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center gap-2 shadow-lg hover:shadow-xl transition-shadow">
                                Selesaikan Pendaftaran
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

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