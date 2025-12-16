<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\AdminSignature;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSignatureController extends Controller
{
    public function index()
    {
        $signatures = AdminSignature::with('user')->latest()->paginate(10);

        // Ambil semua user untuk dropdown (bisa difilter jika perlu)
        $admins = User::all();

        // PERUBAHAN DISINI: Mengarah ke 'resources/views/admin/signature.blade.php'
        return view('admin.signature', compact('signatures', 'admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'signature_file' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // 1. Hapus data lama (Sama seperti kode Anda)
        $existing = AdminSignature::where('user_id', $request->user_id)->first();
        if ($existing) {
            if (Storage::disk('public')->exists($existing->file_path)) {
                Storage::disk('public')->delete($existing->file_path);
            }
            $existing->delete();
        }

        // 2. Upload file visual (Sama seperti kode Anda)
        $file = $request->file('signature_file');
        $path = $file->store('signatures', 'public');

        // ==========================================================
        // BAGIAN BARU: GENERATE RSA SIGNATURE
        // ==========================================================

        try {
            // A. Ambil path lengkap private key dari storage/app/
            $privateKeyPath = storage_path('app/private_key.pem');

            // Cek apakah key ada
            if (!file_exists($privateKeyPath)) {
                return redirect()->back()->withErrors('Private Key tidak ditemukan di server.');
            }

            // B. Baca isi Private Key
            $privateKey = file_get_contents($privateKeyPath);

            // C. Baca isi file gambar (data yang akan ditandatangani)
            // Kita gunakan getRealPath() untuk membaca file sementara yang sedang diupload
            $dataToSign = file_get_contents($file->getRealPath());

            // D. Lakukan Signing menggunakan OpenSSL bawaan PHP
            // Hasil binary akan disimpan di variabel $binarySignature
            $binarySignature = '';
            $success = openssl_sign($dataToSign, $binarySignature, $privateKey, OPENSSL_ALGO_SHA256);

            if (!$success) {
                return redirect()->back()->withErrors('Gagal membuat tanda tangan RSA.');
            }

            // E. Encode ke Base64 agar bisa disimpan di database/teks
            $base64Signature = base64_encode($binarySignature);

        } catch (\Exception $e) {
            // Log error jika terjadi masalah
            Log::error("RSA Error: " . $e->getMessage());
            return redirect()->back()->withErrors('Terjadi kesalahan sistem saat signing.');
        }

        // ==========================================================
        // SIMPAN KE DATABASE
        // ==========================================================

        AdminSignature::create([
            'user_id' => $request->user_id,
            'file_path' => $path,
            // Pastikan Anda sudah membuat kolom 'rsa_signature' di database Anda!
            'rsa_signature' => $base64Signature
        ]);

        return redirect()->back()->with('success', 'Tanda tangan Visual & RSA berhasil disimpan.');
    }

    public function destroy($id)
    {
        $sig = AdminSignature::findOrFail($id);

        if (Storage::disk('public')->exists($sig->file_path)) {
            Storage::disk('public')->delete($sig->file_path);
        }

        $sig->delete();
        return redirect()->back()->with('success', 'Tanda tangan dihapus.');
    }
}