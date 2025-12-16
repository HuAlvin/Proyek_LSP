<?php

namespace App\Http\Controllers;

use App\Models\BuktiPenerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VerificationController extends Controller
{
    /**
     * Memproses Input Kode dari User
     */
    public function manualCheck(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'verification_code' => 'required|string',
        ]);

        $inputCode = trim($request->input('verification_code'));
        $user = Auth::user();

        // 2. CEK APAKAH USER DIBLOKIR (Opsional, sesuai logika sebelumnya)
        if ($user && $user->verification_blocked_until && now()->lessThan($user->verification_blocked_until)) {
            return back()->withErrors(['verification_code' => 'Akun diblokir sementara. Tunggu beberapa saat.']);
        }

        // 3. CARI DI DATABASE
        // Menggunakan 'verification_code' (kode pendek)
        $receipt = BuktiPenerimaan::where('verification_code', $inputCode)->first();

        if ($receipt) {
            // === JIKA VALID ===

            // Reset counter gagal user (jika ada fitur login)
            if ($user) {
                $user->update(['verification_fails' => 0, 'verification_blocked_until' => null]);
            }

            // [PENTING] REDIRECT KE HALAMAN RESULT
            // Kita kirim kodenya sebagai parameter URL agar bisa diambil oleh method showResult
            return redirect()->route('verification.result', ['code' => $receipt->verification_code]);

        } else {
            // === JIKA INVALID ===

            // Logika counter salah password (opsional)
            if ($user) {
                $user->increment('verification_fails');
                if ($user->fresh()->verification_fails >= 5) {
                    $user->update(['verification_blocked_until' => now()->addMinutes(30)]);
                }
            }

            return back()->withErrors(['verification_code' => 'KODE TIDAK DITEMUKAN! Pastikan Anda memasukkan kode verifikasi dengan benar.']);
        }
    }

    /**
     * Menampilkan Halaman Hasil (Screen Result)
     */
    public function showResult($code)
{
    // 1. Ambil Data Kwitansi
    $receipt = BuktiPenerimaan::with('pendaftar')
                ->where('verification_code', $code)
                ->firstOrFail();

    // 2. LOGIKA VERIFIKASI RSA (Real-time Check)
    $isSignatureValid = false; // Default false
    $signatureMessage = "Tanda tangan digital tidak valid atau rusak.";

    try {
        if (Storage::exists('keys/public.pem') && !empty($receipt->digital_signature)) {
            
            // Ambil Public Key
            $publicKey = Storage::get('keys/public.pem');
            
            // Rekonstruksi Data Asli (Format HARUS SAMA PERSIS dengan saat signing di store)
            // Format: ID-NOMINAL-CREATED_AT
            $originalData = $receipt->id . '-' . $receipt->nominal . '-' . $receipt->created_at;
            
            // Decode Base64 Signature
            $binarySignature = base64_decode($receipt->digital_signature);

            // Verifikasi menggunakan OpenSSL
            // Return 1 jika valid, 0 jika invalid
            $verifyResult = openssl_verify($originalData, $binarySignature, $publicKey, OPENSSL_ALGO_SHA256);

            if ($verifyResult === 1) {
                $isSignatureValid = true;
                $signatureMessage = "Tanda Tangan Digital VALID (RSA-SHA256). Integritas data terjamin.";
            }
        }
    } catch (\Exception $e) {
        // Jika error teknis, biarkan invalid
        $signatureMessage = "Terjadi kesalahan saat memverifikasi tanda tangan.";
    }

    // 3. Kirim status validasi ke View
    return view('verification.result', compact('receipt', 'isSignatureValid', 'signatureMessage'));
}
}