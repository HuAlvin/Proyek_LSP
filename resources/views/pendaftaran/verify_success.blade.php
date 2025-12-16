<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Berhasil - Kampus LSP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden border border-green-100">
        {{-- Header Hijau --}}
        <div class="bg-green-600 p-8 text-center">
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-white mb-4 shadow-lg animate-bounce">
                <svg class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-white">Kwitansi Asli</h2>
            <p class="text-green-100 mt-1">Digital Signature Valid</p>
        </div>

        {{-- Isi Data --}}
        <div class="p-6 space-y-4">
            <div class="text-center mb-6">
                <p class="text-sm text-gray-500">Kode signature yang Anda masukkan cocok dengan data di sistem kami.</p>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 space-y-3">
                <div class="flex justify-between">
                    <span class="text-xs text-gray-500 uppercase font-bold">No Referensi</span>
                    <span class="text-sm font-mono font-bold text-gray-800">{{ $receipt->no_referensi }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xs text-gray-500 uppercase font-bold">Nominal</span>
                    <span class="text-sm font-bold text-green-600">Rp {{ number_format($receipt->nominal, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xs text-gray-500 uppercase font-bold">Tanggal</span>
                    <span class="text-sm text-gray-800">{{ $receipt->tanggal_terima->format('d M Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-xs text-gray-500 uppercase font-bold">Verifikator</span>
                    <span class="text-sm text-gray-800">{{ $receipt->admin_name }}</span>
                </div>
            </div>

            <div class="text-xs text-center text-gray-400 mt-4 break-all">
                ID Hash: {{ substr($receipt->digital_signature, 0, 30) }}...
            </div>

            <div class="mt-6">
                <a href="{{ route('user.status') }}" class="block w-full text-center bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 rounded-lg transition">
                    Kembali ke Status
                </a>
            </div>
        </div>
    </div>

</body>
</html>