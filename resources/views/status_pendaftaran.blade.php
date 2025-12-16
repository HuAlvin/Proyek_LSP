<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status Pendaftaran - Kampus LSP</title>

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
    <style>
        @keyframes pulse-soft {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .7;
            }
        }

        .animate-pulse-soft {
            animation: pulse-soft 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>

<body
    class="bg-gray-50 dark:bg-gray-900 font-sans antialiased text-gray-900 dark:text-gray-100 transition-colors duration-300">

    @include('layouts.navbar')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 pt-24">

        @if (session('error'))
            <div class="mb-4 flex items-center p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-900/50 dark:text-red-300"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.404 15.636a1 1 0 1 1 2 0v-2.261a1 1 0 0 1 .458-.854l1.83-1.428a1 1 0 0 1 .158-1.55c-.29-.196-.64-.307-1.002-.307h-4.88c-.362 0-.712.111-1.002.307a1 1 0 0 1 .158 1.55l1.83 1.428a1 1 0 0 1 .458.854v2.261Z" />
                </svg>
                <span class="sr-only">Error</span>
                <div>
                    <span class="font-medium">Perhatian!</span> {{ session('error') }}
                </div>
            </div>
        @endif

        {{-- Notifikasi Hasil Cek Validitas (Tambahan) --}}
        @if (session('verification_status'))
            <div class="mb-4 flex items-center p-4 text-sm rounded-lg {{ session('verification_status') == 'valid' ? 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300' }}"
                role="alert">
                <span class="font-bold mr-2">{{ session('verification_status') == 'valid' ? 'VALID:' : 'INVALID:' }}</span>
                {{ session('verification_message') }}
            </div>
        @endif

        <div class="mb-8 text-center sm:text-left">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Status Pendaftaran Saya</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Pantau progres verifikasi akun dan pendaftaran akademik
                Anda di sini.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- KOLOM KIRI: STATUS UTAMA --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Card 1: Status Akun --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-4">
                                <div class="p-3 rounded-full 
                                    {{ $user->status_verifikasi == 'verified' ? 'bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400' :
    ($user->status_verifikasi == 'rejected' ? 'bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400' :
        'bg-yellow-100 text-yellow-600 dark:bg-yellow-900/30 dark:text-yellow-400') }}">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        @if($user->status_verifikasi == 'verified')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        @elseif($user->status_verifikasi == 'rejected')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        @endif
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Status Akun</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Verifikasi email & data awal
                                        oleh Admin</p>
                                </div>
                            </div>

                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                {{ $user->status_verifikasi == 'verified' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' :
    ($user->status_verifikasi == 'rejected' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' :
        'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 animate-pulse-soft') }}">
                                {{ $user->status_verifikasi == 'verified' ? 'Terverifikasi' : ($user->status_verifikasi == 'rejected' ? 'Ditolak' : 'Menunggu Verifikasi') }}
                            </span>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 h-1.5">
                        <div
                            class="h-1.5 {{ $user->status_verifikasi == 'verified' ? 'bg-green-500 w-full' : ($user->status_verifikasi == 'rejected' ? 'bg-red-500 w-full' : 'bg-yellow-500 w-1/2') }} transition-all duration-1000">
                        </div>
                    </div>
                </div>

                {{-- Card 2: Status Pendaftaran --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-4">
                                <div class="p-3 rounded-full 
                                    @if($pendaftaran && $pendaftaran->status == 'verified')
                                        bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400
                                    @elseif($pendaftaran)
                                        bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400
                                    @else
                                        bg-gray-100 text-gray-400 dark:bg-gray-700 dark:text-gray-500
                                    @endif">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Formulir Pendaftaran
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Biodata & Berkas Mahasiswa</p>
                                </div>
                            </div>

                            @if($pendaftaran)
                                @if($pendaftaran->status == 'verified')
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        Terdaftar
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        Sudah Dikirim
                                    </span>
                                @endif
                            @else
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                    Belum Mendaftar
                                </span>
                            @endif
                        </div>

                        <div class="mt-6">
                            @if(!$pendaftaran)
                                <div
                                    class="flex flex-col gap-4 text-center sm:text-left sm:flex-row items-center justify-between bg-gray-50 dark:bg-gray-700/30 p-4 rounded-lg border border-dashed border-gray-300 dark:border-gray-600">
                                    <div class="text-sm text-gray-600 dark:text-gray-400">
                                        Data pendaftaran tidak ditemukan.
                                        @if($user->status_verifikasi == 'verified')
                                            Silakan isi formulir untuk melanjutkan.
                                        @else
                                            Tunggu verifikasi akun untuk mengisi formulir.
                                        @endif
                                    </div>

                                    @if($user->status_verifikasi == 'verified')
                                        <a href="{{ route('pendaftaran.create') }}"
                                            class="whitespace-nowrap px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-lg shadow transition-colors">
                                            Isi Formulir &rarr;
                                        </a>
                                    @else
                                        <button disabled
                                            class="whitespace-nowrap px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-500 dark:text-gray-400 text-sm font-bold rounded-lg cursor-not-allowed">
                                            Terkunci
                                        </button>
                                    @endif
                                </div>
                            @else
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                                    <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <p class="text-gray-500 dark:text-gray-400 text-xs uppercase font-bold">Nomor
                                            Pendaftaran</p>
                                        <p class="font-mono text-gray-800 dark:text-gray-200 font-bold mt-1">
                                            REG-{{ str_pad($pendaftaran->id, 5, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                    <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <p class="text-gray-500 dark:text-gray-400 text-xs uppercase font-bold">Tanggal
                                            Submit</p>
                                        <p class="font-medium text-gray-800 dark:text-gray-200 mt-1">
                                            {{ $pendaftaran->created_at->format('d F Y, H:i') }} WIB
                                        </p>
                                    </div>

                                    <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg sm:col-span-2">
                                        <p class="text-gray-500 dark:text-gray-400 text-xs uppercase font-bold mb-1">Status
                                            Saat Ini</p>

                                        @php
                                            $statusText = 'Menunggu Validasi Data';
                                            $statusClass = 'text-yellow-600 dark:text-yellow-400';
                                            $showPayButton = false;
                                            $isRegistrationComplete = false;

                                            if ($pendaftaran->status == 'pending') {
                                                $statusText = 'Menunggu Validasi Data';
                                                $statusClass = 'text-yellow-600 dark:text-yellow-400 animate-pulse-soft';
                                            } elseif ($pendaftaran->status == 'verified') {
                                                if ($pendaftaran->pembayaran) {
                                                    if ($pendaftaran->pembayaran->status == 'pending') {
                                                        $statusText = 'Menunggu Validasi Pembayaran';
                                                        $statusClass = 'text-blue-600 dark:text-blue-400 animate-pulse-soft';
                                                    } elseif ($pendaftaran->pembayaran->status == 'valid') {
                                                        $statusText = 'Pendaftaran Selesai';
                                                        $statusClass = 'text-green-600 dark:text-green-400 font-bold';
                                                        $isRegistrationComplete = true;
                                                    } elseif ($pendaftaran->pembayaran->status == 'invalid') {
                                                        $statusText = 'Pembayaran Ditolak - Silakan Upload Ulang';
                                                        $statusClass = 'text-red-600 dark:text-red-400';
                                                        $showPayButton = true;
                                                    }
                                                } else {
                                                    $statusText = 'Menunggu Pembayaran Mahasiswa';
                                                    $statusClass = 'text-blue-600 dark:text-blue-400 font-bold';
                                                    $showPayButton = true;
                                                }
                                            } elseif ($pendaftaran->status == 'rejected') {
                                                $statusText = 'Pendaftaran Ditolak';
                                                $statusClass = 'text-red-600 dark:text-red-400';
                                            }
                                        @endphp

                                        <p class="font-medium text-lg {{ $statusClass }} mb-4">
                                            {{ $statusText }}
                                        </p>

                                        @if($showPayButton)
                                            <div class="mt-4">
                                                <a href="{{ route('pendaftaran.biaya') }}"
                                                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-campus-600 hover:bg-campus-800 text-white text-sm font-medium rounded-lg transition-colors shadow-md">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                                        </path>
                                                    </svg>
                                                    Lakukan Pembayaran Sekarang
                                                </a>
                                                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Klik tombol di atas
                                                    untuk mengupload bukti pembayaran.</p>
                                            </div>
                                        @endif

                                        @if($isRegistrationComplete)
                                            <div class="mt-6">
                                                <a href="{{ route('pendaftaran.konfirmasi') }}"
                                                    class="inline-flex items-center justify-center gap-2 px-6 py-3 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-sm transition-all shadow-lg shadow-green-500/30 w-full sm:w-auto">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Grup Mahasiswa Baru
                                                </a>
                                                <p class="mt-2 text-xs text-green-700 dark:text-green-400 font-medium">Selamat,
                                                    pendaftaran Anda telah selesai 100%.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN --}}
            <div class="lg:col-span-1">

                {{-- Card: Alur Pendaftaran (Sticky) --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 sticky top-24">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Alur Pendaftaran</h3>

                    <ol class="relative border-l border-gray-200 dark:border-gray-700 ml-3">
                        <li class="mb-10 ml-6">
                            <span
                                class="absolute flex items-center justify-center w-6 h-6 bg-green-200 rounded-full -left-3 ring-8 ring-white dark:ring-gray-800 dark:bg-green-900">
                                <svg class="w-3 h-3 text-green-600 dark:text-green-300" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <h3 class="flex items-center mb-1 text-sm font-semibold text-gray-900 dark:text-white">
                                Registrasi Akun</h3>
                        </li>

                        <li class="mb-10 ml-6">
                            @php
                                $isPendaftaranSubmitted = ($pendaftaran && $pendaftaran->status != 'pending');
                                $isPendaftaranVerified = ($pendaftaran && $pendaftaran->status == 'verified');
                            @endphp
                            <span class="absolute flex items-center justify-center w-6 h-6 
                                {{ $isPendaftaranVerified ? 'bg-green-200 dark:bg-green-900' :
    ($isPendaftaranSubmitted ? 'bg-blue-200 dark:bg-blue-900 ring-8 ring-white dark:ring-gray-800' : 'bg-gray-200 dark:bg-gray-700') }} 
                                rounded-full -left-3">
                                @if($isPendaftaranVerified)
                                    <svg class="w-3 h-3 text-green-600 dark:text-green-300" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                @else
                                    <span
                                        class="text-xs font-bold text-gray-600 dark:text-gray-400 {{ $isPendaftaranSubmitted ? 'text-blue-600 dark:text-blue-400' : '' }}">2</span>
                                @endif
                            </span>
                            <h3 class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Validasi Data</h3>
                        </li>

                        <li class="mb-10 ml-6">
                            @php
                                $isPaymentSubmitted = ($pendaftaran && $pendaftaran->pembayaran);
                                $isPaymentValid = ($pendaftaran && $pendaftaran->pembayaran && $pendaftaran->pembayaran->status == 'valid');
                            @endphp

                            <span class="absolute flex items-center justify-center w-6 h-6 
                                {{ $isPaymentValid ? 'bg-green-200 dark:bg-green-900' :
    ($isPaymentSubmitted ? 'bg-blue-200 dark:bg-blue-900' : 'bg-gray-200 dark:bg-gray-700') }}
                                rounded-full -left-3 ring-8 ring-white dark:ring-gray-800">
                                @if($isPaymentValid)
                                    <svg class="w-3 h-3 text-green-600 dark:text-green-300" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                @else
                                    <span
                                        class="text-xs font-bold text-gray-600 dark:text-gray-400 {{ $isPaymentSubmitted ? 'text-blue-600 dark:text-blue-400' : '' }}">3</span>
                                @endif
                            </span>
                            <h3 class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Pembayaran</h3>
                        </li>

                        <li class="ml-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 
                                {{ $isPaymentValid ? 'bg-green-200 dark:bg-green-900' : 'bg-gray-200 dark:bg-gray-700' }}
                                rounded-full -left-3 ring-8 ring-white dark:ring-gray-800">
                                @if($isPaymentValid)
                                    <svg class="w-3 h-3 text-green-600 dark:text-green-300" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                @else
                                    <span class="text-xs font-bold text-gray-600 dark:text-gray-400">4</span>
                                @endif
                            </span>
                            <h3 class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Pendaftaran Selesai
                            </h3>
                        </li>
                    </ol>
                </div>

                {{-- Card BARU: Cek Keaslian Kwitansi (Input Manual QR/Hash) --}}
                <div
                    class="mt-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="p-2 bg-purple-100 dark:bg-purple-900/30 rounded-lg text-purple-600 dark:text-purple-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Cek Keaslian Kwitansi</h3>
                    </div>

                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">
                        Masukkan <b>Kode Verifikasi</b> (contoh: VF-XXXX) yang tertera pada kotak putus-putus di dokumen
                        kwitansi Anda.
                    </p>

                    {{-- Form Cek --}}
                    <form action="{{ route('verification.manual_check') }}" method="POST" class="space-y-3">
                        @csrf
                        <div>
                            {{-- UBAH LABEL --}}
                            <label for="verification_code" class="sr-only">Kode Verifikasi</label>

                            {{-- UBAH NAME, ID, VALUE, PLACEHOLDER --}}
                            <input type="text" name="verification_code" id="verification_code" required
                                value="{{ old('verification_code') }}" placeholder="Contoh: VF-A1B2-C3D4" class="w-full rounded-lg border-gray-300 bg-gray-50 p-2.5 text-sm focus:border-purple-500 focus:ring-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 
               @error('verification_code') border-red-500 bg-red-50 dark:bg-red-900/10 @enderror">

                            {{-- UBAH ERROR DIRECTIVE --}}
                            @error('verification_code')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full rounded-lg bg-purple-600 px-5 py-2.5 text-sm font-bold text-white hover:bg-purple-700 focus:outline-none focus:ring-4 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                            {{ (Auth::user()->verification_blocked_until && now() < Auth::user()->verification_blocked_until) ? 'disabled' : '' }}>

                            {{ (Auth::user()->verification_blocked_until && now() < Auth::user()->verification_blocked_until) ? 'Terkunci Sementara' : 'Cek Validitas' }}
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>

</body>

</html>