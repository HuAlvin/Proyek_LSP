<!DOCTYPE html>
<html>

<head>
    <title>Kwitansi Pembayaran - {{ $receipt->no_referensi }}</title>
    <style>
        @page {
            margin: 0px;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11px;
            color: #333;
            line-height: 1.3;
            padding: 20px 30px;
            position: relative;
        }

        .rsa-code {
            font-size: 1px;
            color: #FFFFFF;
            /* Invisible */
            line-height: 0;
            user-select: all;
            word-break: break-all;
            /* Penting agar PDF tidak error layout */
            white-space: pre-wrap;
            /* Opsional: menjaga format string */
        }

        .container {
            width: 100%;
            padding: 10px;
            background-color: #fff;
            position: relative;
        }

        .header {
            border-bottom: 2px double #444;
            padding-bottom: 10px;
            margin-bottom: 15px;
            display: table;
            width: 100%;
        }

        .logo {
            display: table-cell;
            vertical-align: middle;
            width: 70px;
        }

        .company-details {
            display: table-cell;
            vertical-align: middle;
            padding-left: 10px;
        }

        .company-name {
            font-size: 18px;
            font-weight: bold;
            color: #1e40af;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .kwitansi-title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .content-table {
            width: 100%;
            border-collapse: collapse;
        }

        .content-table td {
            padding: 5px 2px;
            vertical-align: top;
        }

        .label {
            width: 110px;
            font-weight: bold;
        }

        .separator {
            width: 10px;
            text-align: center;
        }

        .field {
            border-bottom: 1px dotted #999;
            width: 100%;
        }

        .amount-box {
            margin-top: 15px;
            display: table;
            width: 100%;
        }

        .amount-text {
            display: table-cell;
            vertical-align: middle;
            font-style: italic;
            font-weight: bold;
            background-color: #f0f0f0;
            padding: 8px 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 13px;
        }

        .footer-table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }

        .footer-left {
            width: 55%;
            vertical-align: top;
            text-align: left;
            padding-right: 15px;
        }

        .footer-right {
            width: 45%;
            vertical-align: bottom;
            text-align: right;
        }

        .signature-box {
            display: inline-block;
            text-align: center;
            width: 180px;
        }

        .footer-date {
            margin-bottom: 5px;
        }

        .signature-img {
            height: 60px;
            margin: 5px 0;
            object-fit: contain;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .admin-name {
            font-weight: bold;
            text-decoration: underline;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 80px;
            color: rgba(0, 0, 0, 0.04);
            font-weight: bold;
            z-index: 0;
            pointer-events: none;
        }

        /* === INVISIBLE VERIFICATION BOX STYLE === */
        /* Kode ini diubah agar tidak terlihat mata tapi ada di PDF */
        .verification-box {
            border: none;
            /* Hilangkan garis putus-putus */
            padding: 0;
            background-color: transparent;
            /* Hilangkan warna abu */
            margin-bottom: 0;
            height: 1px;
            /* Minimalisir tinggi layout */
            overflow: hidden;
        }

        .verification-label {
            display: none;
            /* Label "KODE VERIFIKASI" disembunyikan total */
        }

        .verification-code-text {
            font-size: 1px;
            /* Ukuran sangat kecil */
            font-weight: normal;
            color: #FFFFFF;
            /* WARNA PUTIH (Sama dengan kertas, jadi invisible) */
            line-height: 0;
            white-space: nowrap;
            user-select: all;
            /* Agar kena saat Ctrl+A */
        }

        .verification-note {
            display: none;
            /* Catatan disembunyikan */
        }

        /* === INVISIBLE RSA STYLE === */
        .rsa-container {
            border: none;
            margin: 0;
            padding: 0;
            height: 1px;
            overflow: hidden;
        }

        .rsa-title {
            display: none;
        }

        .rsa-code {
            font-size: 1px;
            color: #FFFFFF;
            /* WARNA PUTIH (Invisible) */
            line-height: 0;
            user-select: all;
        }

        /* === STEALTH VERIFICATION STYLE (Invisible) === */
        /* Ini kode hash panjang yang sebelumnya sudah ada */
        .stealth-verification {
            position: fixed;
            bottom: 0px;
            left: 0px;
            width: 100%;
            height: 1px;
            color: #FFFFFF;
            font-size: 1px;
            line-height: 0;
            z-index: -9999;
            overflow: hidden;
            opacity: 0.01;
            white-space: nowrap;
            user-select: all;
        }
    </style>
</head>

<body>

    {{-- Invisible Hash (Tetap dipertahankan) --}}
    <div class="stealth-verification">
        {{ $hiddenString ?? '' }}
    </div>

    <div class="container">
        <div class="watermark">LUNAS</div>

        <div class="header">
            <div class="logo">
                @if(file_exists(public_path('images/logo.png')))
                    <img src="{{ public_path('images/logo.png') }}" width="60" alt="Logo">
                @else
                    <div
                        style="width:60px; height:60px; background:#ddd; line-height:60px; text-align:center; font-size:10px;">
                        No Logo</div>
                @endif
            </div>
            <div class="company-details">
                <div class="company-name">Kampus LSP</div>
                <div style="font-size: 10px;">Jl. Teknologi No. 12, Kota Digital, Indonesia</div>
                <div style="font-size: 10px;">Telp: (021) 1234-5678 | Email: info@kampuslsp.ac.id</div>
            </div>
        </div>

        <div class="kwitansi-title">BUKTI PEMBAYARAN</div>

        <table class="content-table">
            <tr>
                <td class="label">No. Referensi</td>
                <td class="separator">:</td>
                <td class="field">{{ $receipt->no_referensi }}</td>
            </tr>
            <tr>
                <td class="label">Sudah Terima Dari</td>
                <td class="separator">:</td>
                <td class="field">{{ $receipt->pendaftar->name ?? 'Peserta Umum' }}</td>
            </tr>
            <tr>
                <td class="label">Untuk Pembayaran</td>
                <td class="separator">:</td>
                <td class="field">
                    {{ $receipt->keterangan ?? 'Pembayaran Pendaftaran' }}
                    @if(isset($receipt->pendaftar->prodi))
                        <br><span style="font-size: 10px;">(Program Studi: {{ $receipt->pendaftar->prodi }})</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="label">Tanggal Terima</td>
                <td class="separator">:</td>
                <td class="field">
                    {{ \Carbon\Carbon::parse($receipt->tanggal_terima)->translatedFormat('d F Y') }}
                </td>
            </tr>
        </table>

        <div class="amount-box">
            <div class="amount-text">
                Total: Rp {{ number_format($receipt->nominal, 0, ',', '.') }},-
            </div>
        </div>

        <table class="footer-table">
            <tr>
                <td class="footer-left">
                    {{-- 1. KOTAK KODE VERIFIKASI (Sekarang Invisible) --}}
                    @if(!empty($receipt->verification_code))
                        <div class="verification-box">
                            <div class="verification-label">KODE VERIFIKASI DOKUMEN:</div>
                            <div class="verification-code-text">
                                {{ $receipt->verification_code }}
                            </div>
                            <div class="verification-note">
                                *Gunakan kode di atas untuk cek keaslian dokumen di website kampus.
                            </div>
                        </div>
                    @endif

                    {{-- 2. RSA SIGNATURE (Sekarang Invisible) --}}
                    @if(!empty($signatureCode))
                        <div class="rsa-container">
                            {{-- Hapus judul agar tidak ikut ter-copy --}}
                            <div class="rsa-title" style="display:none;">DIGITAL SIGNATURE HASH (RSA SHA-256)</div>

                            <div class="rsa-code">
                                {{-- PERBAIKAN: Tampilkan kode SECARA UTUH tanpa substr/pemotongan --}}
                                {{-- Kita hapus chunk_split dan nl2br agar string menyatu saat di-copy --}}
                                {{ $signatureCode }}
                            </div>
                        </div>
                    @endif
                </td>

                <td class="footer-right">
                    <div class="signature-box">
                        <div class="footer-date">Kota Digital, {{ date('d F Y') }}</div>
                        <div>Verifikator Keuangan,</div>

                        {{-- Logika Menampilkan Gambar Tanda Tangan dengan Konversi Base64 --}}
                        @php
                            $signaturePath = isset($signature) && $signature ? storage_path('app/public/' . $signature->file_path) : null;
                        @endphp

                        @if($signaturePath && file_exists($signaturePath))
                            @php
                                // Ubah gambar jadi string base64 agar terbaca oleh DomPDF
                                $type = pathinfo($signaturePath, PATHINFO_EXTENSION);
                                $data = file_get_contents($signaturePath);
                                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                            @endphp
                            <img src="{{ $base64 }}" class="signature-img" alt="Tanda Tangan">
                        @else
                            {{-- Jika tidak ada tanda tangan, beri jarak kosong --}}
                            <br><br><br><br>
                        @endif

                        <div class="admin-name">{{ $receipt->admin_name }}</div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>