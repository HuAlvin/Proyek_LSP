<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminSignature; // <--- Jangan lupa import ini
use Illuminate\Support\Facades\Auth;

class ReceiptController extends Controller
{
    public function store(Request $request)
{
    // 1. Validasi input standar kwitansi
    $request->validate([
        'nominal' => 'required',
        'pendaftar_id' => 'required',
        // ... validasi lainnya
    ]);

    // 2. AMBIL TANDA TANGAN ADMIN YANG SEDANG LOGIN
    // Kita cari data signature berdasarkan ID user yang sedang login
    $adminSig = AdminSignature::where('user_id', Auth::id())->first();

    // Opsional: Cek jika admin belum punya tanda tangan
    if (!$adminSig) {
        return redirect()->back()->withErrors('Anda belum mengatur tanda tangan digital. Mohon upload di menu pengaturan.');
    }

    // 3. Simpan ke database Kwitansi
    // Asumsi nama model kwitansi Anda adalah 'Receipt' atau 'Payment'
    $receipt = Receipt::create([
        'pendaftar_id' => $request->pendaftar_id,
        'no_referensi' => 'KW-' . date('Y') . '-' . strtoupper(uniqid()), // Contoh saja
        'nominal' => $request->nominal,
        'tanggal_terima' => now(),
        'keterangan' => $request->keterangan,
        
        'admin_name' => Auth::user()->name, // Mengambil nama admin
        
        // BAGIAN KUNCI: Pindahkan kode signature ke kolom ini
        'digital_signature' => $adminSig->rsa_signature, 
    ]);

    // ... codingan generate PDF atau redirect lainnya
}
}
