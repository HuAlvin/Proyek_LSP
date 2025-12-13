<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Pembayaran - Admin Panel</title>

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

<body class="bg-gray-50 dark:bg-gray-900 font-sans antialiased transition-colors duration-300">

    <div class="flex h-screen overflow-hidden">

        @include('layouts.navbar_admin')

        <div class="flex h-full flex-1 flex-col overflow-y-auto">

            <header class="flex h-16 items-center justify-between border-b border-gray-200 bg-white px-6 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <h1 class="text-xl font-bold text-gray-800 dark:text-white">Verifikasi Pembayaran</h1>
                </div>

                <a href="{{ route('admin.pendaftar') }}" class="text-sm font-medium text-gray-500 hover:text-campus-600 dark:text-gray-400 dark:hover:text-white flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali
                </a>
            </header>

            <main class="flex-1 p-6">
                
                @if (session('success'))
                    <div id="alert-success" class="mb-4 p-4 text-green-800 rounded-lg bg-green-100 dark:bg-green-900/50 dark:text-green-300 flex justify-between items-center">
                        <span class="font-medium">{{ session('success') }}</span>
                        <button onclick="this.parentElement.remove()" class="text-green-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <div class="lg:col-span-2">
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                            <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                                <h3 class="font-bold text-gray-800 dark:text-white">Bukti Transfer</h3>
                                @if($pendaftar->pembayaran && $pendaftar->pembayaran->gambar)
                                    <a href="{{ asset('storage/' . $pendaftar->pembayaran->gambar) }}" target="_blank" class="text-xs text-blue-600 hover:underline dark:text-blue-400 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                        Buka Gambar Asli
                                    </a>
                                @endif
                            </div>
                            
                            <div class="p-4 bg-gray-100 dark:bg-gray-900 flex justify-center items-center min-h-[400px]">
                                @if($pendaftar->pembayaran && $pendaftar->pembayaran->gambar)
                                    <img src="{{ asset('storage/' . $pendaftar->pembayaran->gambar) }}" 
                                         class="max-w-full max-h-[600px] rounded-lg shadow-md object-contain" 
                                         alt="Bukti Pembayaran">
                                @else
                                    <div class="text-center text-gray-500">
                                        <svg class="w-16 h-16 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <p>Belum ada bukti pembayaran yang diupload.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-1 space-y-6">

                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4 border-b border-gray-100 dark:border-gray-700 pb-2">Detail Pendaftar</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider">Nama Lengkap</p>
                                    <p class="font-medium text-gray-900 dark:text-white text-lg">{{ $pendaftar->name }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider">Program Studi</p>
                                    <p class="font-medium text-campus-600 dark:text-blue-400">{{ $pendaftar->prodi }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider">Email</p>
                                    <p class="font-medium text-gray-700 dark:text-gray-300">{{ $pendaftar->email }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider">Tanggal Upload</p>
                                    <p class="font-medium text-gray-700 dark:text-gray-300">
                                        {{ $pendaftar->pembayaran ? \Carbon\Carbon::parse($pendaftar->pembayaran->created_at)->format('d M Y, H:i') : '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4 border-b border-gray-100 dark:border-gray-700 pb-2">Validasi Biaya</h3>

                            @php
                                $expectedAmount = ($pendaftar->prodi == 'Teknik Informatika') ? 350000 : 300000;
                                $uploadedAmount = $pendaftar->pembayaran->jumlah_bayar ?? 0;
                                $isMatch = $expectedAmount == $uploadedAmount;
                            @endphp

                            <div class="mb-4 p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Tagihan Seharusnya:</span>
                                    <span class="font-bold text-gray-900 dark:text-white">Rp {{ number_format($expectedAmount, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Input User:</span>
                                    <span class="font-bold text-gray-900 dark:text-white">Rp {{ number_format($uploadedAmount, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <div class="mb-6">
                                <p class="text-xs text-gray-500 uppercase tracking-wider mb-2">Status Saat Ini</p>
                                @if(!$pendaftar->pembayaran)
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm font-bold">Belum Upload</span>
                                @elseif($pendaftar->pembayaran->status == 'pending')
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-bold animate-pulse">Menunggu Verifikasi</span>
                                @elseif($pendaftar->pembayaran->status == 'valid')
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-bold">Valid (Diterima)</span>
                                @elseif($pendaftar->pembayaran->status == 'invalid')
                                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-bold">Invalid (Ditolak)</span>
                                @endif
                            </div>

                            @if($pendaftar->pembayaran && $pendaftar->pembayaran->status == 'pending')
                                <div class="grid grid-cols-2 gap-3">
                                    <button onclick="openModal('rejected')" class="flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-white border border-red-500 text-red-600 hover:bg-red-50 font-semibold rounded-lg transition-colors dark:bg-gray-800 dark:hover:bg-red-900/20">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        Tolak
                                    </button>
                                    <button onclick="openModal('verified')" class="flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors shadow-lg shadow-green-200 dark:shadow-none">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Terima
                                    </button>
                                </div>
                            @else
                                <div class="text-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg text-gray-500 dark:text-gray-400 italic text-sm">
                                    Status pembayaran sudah difinalisasi.
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

            </main>
        </div>
    </div>

    <div id="actionModal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg dark:bg-gray-800">
                    
                    <form id="actionForm" action="" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 dark:bg-gray-800">
                            <div class="sm:flex sm:items-start">
                                <div id="modalIcon" class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-white" id="modalTitle">Konfirmasi</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500 dark:text-gray-400" id="modalMessage">Apakah Anda yakin?</p>
                                    </div>

                                    <div id="rejectReasonContainer" class="mt-4 hidden">
                                        <label for="catatan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 text-left mb-1">Alasan Penolakan (Opsional)</label>
                                        <textarea name="catatan_admin" id="catatan" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="Contoh: Nominal tidak sesuai..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 dark:bg-gray-700/50">
                            <button type="submit" id="modalSubmitBtn" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">
                                Konfirmasi
                            </button>
                            <button type="button" onclick="closeModal()" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto dark:bg-gray-700 dark:text-gray-300 dark:ring-gray-600 dark:hover:bg-gray-600">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        }

        function openModal(type) {
            const modal = document.getElementById('actionModal');
            const form = document.getElementById('actionForm');
            const title = document.getElementById('modalTitle');
            const message = document.getElementById('modalMessage');
            const icon = document.getElementById('modalIcon');
            const submitBtn = document.getElementById('modalSubmitBtn');
            const rejectContainer = document.getElementById('rejectReasonContainer');

            form.action = "{{ route('admin.pendaftar.verify_payment', $pendaftar->id) }}"; 

            let statusInput = document.getElementById('statusInput');
            if(!statusInput) {
                statusInput = document.createElement('input');
                statusInput.type = 'hidden';
                statusInput.name = 'status';
                statusInput.id = 'statusInput';
                form.appendChild(statusInput);
            }
            statusInput.value = type;

            if (type === 'verified') {
                title.innerText = "Terima Pembayaran";
                message.innerText = "Pastikan nominal dan bukti transfer sudah sesuai. Status pendaftar akan berubah menjadi 'Verified'.";
                icon.className = "mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10";
                icon.innerHTML = `<svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>`;
                submitBtn.className = "inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto";
                submitBtn.innerText = "Ya, Terima";
                rejectContainer.classList.add('hidden');
            } else {
                title.innerText = "Tolak Pembayaran";
                message.innerText = "Pembayaran akan ditandai sebagai invalid. Pendaftar diminta upload ulang.";
                icon.className = "mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10";
                icon.innerHTML = `<svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>`;
                submitBtn.className = "inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto";
                submitBtn.innerText = "Tolak Pembayaran";
                rejectContainer.classList.remove('hidden');
            }

            modal.classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('actionModal').classList.add('hidden');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('actionModal');
            if (event.target == modal.querySelector('.fixed.inset-0.bg-gray-900')) {
                closeModal();
            }
        }
    </script>
</body>
</html>