<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kwitansi;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class KwitansiController extends Controller
{
    // --- 1. PROSES SIGNING (Saat Kwitansi Dibuat) ---
    public function store(Request $request)
    {
        // A. Simpan Data Kwitansi Normal
        $kwitansi = new Kwitansi();
        $kwitansi->nama_pembayar = $request->nama;
        $kwitansi->jumlah = $request->jumlah;
        $kwitansi->tanggal = now();
        $kwitansi->save();

        // B. Siapkan Data untuk Ditandatangani (M)
        // Kita gabungkan data unik menjadi string. Ini adalah "M" dalam rumus.
        $dataToSign = $kwitansi->id . '|' . $kwitansi->nama_pembayar . '|' . $kwitansi->jumlah;

        // C. Ambil Private Key (d)
        $privateKey = Storage::get('keys/private.pem');

        // D. Lakukan Enkripsi RSA (Signing)
        // Rumus: Signature = (Hash(Data))^d mod n
        openssl_sign($dataToSign, $signature, $privateKey, OPENSSL_ALGO_SHA256);

        // E. Simpan Signature (Encode ke Base64 agar bisa disimpan di DB)
        $kwitansi->digital_signature = base64_encode($signature);
        $kwitansi->save();

        return redirect()->route('kwitansi.show', $kwitansi->id);
    }

    // --- 2. TAMPILKAN QR CODE ---
    public function show($id)
    {
        $kwitansi = Kwitansi::findOrFail($id);

        // Isi QR Code adalah URL Verifikasi yang membawa ID dan Signature
        // Saat discan, QR akan membuka link ini.
        $urlVerifikasi = route('kwitansi.verify', [
            'id' => $kwitansi->id, 
            'signature' => $kwitansi->digital_signature
        ]);

        // Generate QR Code
        $qrcode = QrCode::size(200)->generate($urlVerifikasi);

        return view('kwitansi_show', compact('kwitansi', 'qrcode'));
    }

    // --- 3. PROSES VERIFIKASI (Saat QR Discan) ---
    public function verify(Request $request, $id)
    {
        $kwitansi = Kwitansi::findOrFail($id);
        
        // Ambil Signature dari URL (QR Code)
        $signatureDariQR = base64_decode($request->query('signature'));

        // Ambil Data Asli dari Database (untuk dicocokkan)
        $dataAsli = $kwitansi->id . '|' . $kwitansi->nama_pembayar . '|' . $kwitansi->jumlah;

        // Ambil Public Key (e)
        $publicKey = Storage::get('keys/public.pem');

        // Lakukan Verifikasi RSA
        // Rumus: Apakah (Signature)^e mod n == Hash(DataAsli) ?
        $isValid = openssl_verify($dataAsli, $signatureDariQR, $publicKey, OPENSSL_ALGO_SHA256);

        if ($isValid === 1) {
            // JIKA VALID: Tampilkan Halaman Kwitansi Asli
            return view('kwitansi_valid', compact('kwitansi'));
        } else {
            // JIKA PALSU: Data telah dimodifikasi atau Signature salah
            return abort(403, 'PERINGATAN: Tanda tangan digital tidak valid! Kwitansi ini mungkin palsu.');
        }
    }
    public function preview($id)
    {
        $kwitansi = Kwitansi::findOrFail($id);

        // URL ini yang akan tertanam di QR Code.
        // Saat di-scan, HP akan membuka link ini untuk verifikasi.
        $verificationUrl = route('kwitansi.verify', [
            'id' => $kwitansi->id, 
            'signature' => $kwitansi->digital_signature
        ]);

        // Generate QR Code
        $qrcode = QrCode::size(200)->generate($verificationUrl);

        return view('kwitansi_preview', compact('kwitansi', 'qrcode'));
    }
}