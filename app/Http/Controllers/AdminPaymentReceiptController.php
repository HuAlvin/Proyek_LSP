<?php

namespace App\Http\Controllers;

use App\Models\BuktiPenerimaan;
use App\Models\Pendaftar;
use App\Models\AdminSignature;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminPaymentReceiptController extends Controller
{
    public function index(Request $request)
    {
        $query = BuktiPenerimaan::with('pendaftar.user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('no_referensi', 'like', "%{$search}%")
                ->orWhereHas('pendaftar', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }

        $receipts = $query->latest()->paginate(10);

        return view('admin.kwintansi', compact('receipts'));
    }

    public function create($id)
    {
        $pendaftar = Pendaftar::with('pembayaran')->findOrFail($id);

        if ($pendaftar->buktiPenerimaan) {
            return redirect()->route('admin.pendaftar.show_payment', $id)
                ->with('error', 'Bukti penerimaan sudah pernah dibuat.');
        }

        // Hanya ambil user yang ID-nya terdaftar di tabel admin_signatures
        $admins = User::whereIn('id', AdminSignature::pluck('user_id'))->get();

        return view('admin.create_receipt', compact('pendaftar', 'admins'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nominal' => 'required|numeric|min:0',
            'tanggal_terima' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
            'admin_name' => 'required|string|exists:users,name', // Pastikan validasi ini sesuai
        ]);

        $pendaftar = Pendaftar::findOrFail($id);

        // 1. CEK TANDA TANGAN ADMIN (Logika Baru)
        // Kita cari signature milik admin yang sedang login atau yang dipilih
        // Disarankan menggunakan Auth::id() jika yang tanda tangan adalah yang login
        $adminSig = AdminSignature::where('user_id', Auth::id())->first();

        // Jika admin belum punya tanda tangan, tolak.
        if (!$adminSig || empty($adminSig->rsa_signature)) {
            return back()->with('error', 'GAGAL: Anda belum mengatur Tanda Tangan Digital (RSA). Silakan atur di menu Profil/Signature.');
        }
        $shortCode = 'VF-' . strtoupper(Str::random(6));
        // 2. Simpan Data ke Database
        $receipt = BuktiPenerimaan::create([
            'pendaftar_id' => $pendaftar->id,
            'no_referensi' => 'KW-' . date('Y') . '-' . strtoupper(Str::random(5)),
            'nominal' => $request->nominal, // pastikan request nominal masuk
            'tanggal_terima' => $request->tanggal_terima,
            'keterangan' => $request->keterangan,
            'admin_name' => Auth::user()->name,

            // PASTIKAN BARIS INI ADA
            'verification_code' => $shortCode,

            'digital_signature' => null,
        ]);

        return redirect()->route('admin.receipts.print', $receipt->id);
    }

    public function printpdf($id)
    {
        // 1. Ambil data kwitansi
        $receipt = BuktiPenerimaan::with('pendaftar.user')->findOrFail($id);

        // 2. Cari Data Admin Signature (Untuk Gambar & Fallback RSA)
        // Cari user berdasarkan nama yang tercantum di kwitansi
        $adminUser = User::where('name', $receipt->admin_name)->first();
        $signatureData = null;

        if ($adminUser) {
            $signatureData = AdminSignature::where('user_id', $adminUser->id)->first();
        }

        // --- LOGIKA PERBAIKAN: JIKA KWITANSI LAMA BELUM ADA SIGNATURE ---
        if (empty($receipt->digital_signature) && $signatureData) {
            // Update kwitansi dengan signature admin yang ada sekarang
            $receipt->digital_signature = $signatureData->rsa_signature;
            $receipt->save();
            $receipt->refresh();
        }
        // --- END LOGIKA PERBAIKAN ---

        // 3. SIAPKAN VARIABEL UNTUK PDF
        $signature = $signatureData; // Objek AdminSignature (untuk path gambar)
        $signatureCode = $receipt->digital_signature; // String RSA (untuk text box)

        // Variabel pelengkap (jika view membutuhkannya)
        $hiddenString = hash('sha256', $receipt->no_referensi . $receipt->created_at . $receipt->nominal);

        $pdf = Pdf::loadView('kwintansi_pdf', compact('receipt', 'signature', 'signatureCode', 'hiddenString'));
        $pdf->setPaper('a5', 'landscape');

        return $pdf->stream('Kwitansi-' . $receipt->no_referensi . '.pdf');
    }

    public function show($id)
    {
        $receipt = BuktiPenerimaan::with(['pendaftar.user', 'pendaftar.pembayaran'])->findOrFail($id);

        $adminUser = User::where('name', $receipt->admin_name)->first();
        $signature = null;

        if ($adminUser) {
            $signature = AdminSignature::where('user_id', $adminUser->id)->first();
        }

        return view('admin.kwintansi_show', compact('receipt', 'signature'));
    }

    public function verifyManual(Request $request)
    {
        // 1. Validasi Input (Tambahkan no_referensi)
        $request->validate([
            'no_referensi' => 'required|string',
            'signature' => 'required|string',
        ]);

        // 2. Bersihkan Input (Hapus spasi/enter dari copy-paste PDF)
        $inputRef = trim($request->input('no_referensi'));
        $inputSignature = preg_replace('/\s+/', '', $request->input('signature'));

        // 3. CARI DATA BERDASARKAN NO REFERENSI (Bukan User Login)
        $receipt = BuktiPenerimaan::where('no_referensi', $inputRef)->first();

        if (!$receipt) {
            return back()->withErrors(['no_referensi' => 'Nomor Referensi tidak ditemukan di sistem.'])->withInput();
        }

        // 4. LOGIKA VERIFIKASI (String Comparison)
        // Bersihkan data signature di database juga (jaga-jaga)
        $dbSignature = preg_replace('/\s+/', '', $receipt->digital_signature);

        if ($inputSignature === $dbSignature) {
            return back()->with([
                'verification_status' => 'valid',
                'verification_message' => 'VALID! Kode cocok. Kwitansi ini ASLI diterbitkan oleh sistem.'
            ]);
        } else {
            return back()->withErrors(['signature' => 'INVALID! Kode tanda tangan tidak cocok dengan data sistem.'])->withInput();
        }
    }

    // Helper function (Tetap sama seperti yang Anda buat)
    private function incrementFail($user)
    {
        $user->increment('verification_fails');

        $fails = $user->fresh()->verification_fails;
        $maxAttempts = 5;

        if ($fails >= $maxAttempts) {
            // Blokir selama 1 bulan (30 hari)
            $user->update(['verification_blocked_until' => now()->addDays(30)]);
            return back()->with('error', 'Anda telah salah memasukkan kode 5 kali. Fitur verifikasi dikunci selama 30 hari.');
        }

        $sisa = $maxAttempts - $fails;
        return back()->withErrors(['signature' => "Kode Invalid! Tanda tangan tidak cocok. Sisa percobaan: {$sisa} kali."])->withInput();
    }
}