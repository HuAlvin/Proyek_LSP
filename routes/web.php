<?php

use App\Models\BuktiPenerimaan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

// Controllers Imports
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPaymentReceiptController;
use App\Http\Controllers\AdminSignatureController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\VerificationController;

/*
|--------------------------------------------------------------------------
| 1. PUBLIC ROUTES (Accessible by everyone)
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome')->name('home');

// --- Verification & Kwitansi (Public Access) ---
Route::controller(VerificationController::class)->group(function () {
    Route::post('/verification/check', 'manualCheck')->name('verification.manual_check');
    Route::get('/verification/result/{code}', 'showResult')->name('verification.result');
});

Route::controller(KwitansiController::class)->group(function () {
    Route::get('/kwitansi/buat', function () {
        return view('kwitansi_form');
    })->name('kwitansi.create');
    Route::post('/kwitansi/store', 'store')->name('kwitansi.store');
    Route::get('/kwitansi/{id}', 'show')->name('kwitansi.show');
    // Optional: URL-based verification
    Route::get('/kwitansi/verify/{id}', 'verify')->name('kwitansi.verify');
});

// QR Code Verification (AdminPaymentReceiptController logic)
Route::get('/verify-kwitansi/{id}', [AdminPaymentReceiptController::class, 'verify'])->name('kwitansi.verify.qr');


// --- Pengumuman ---
Route::controller(PengumumanController::class)->group(function () {
    Route::get('/pengumuman', 'publicIndex')->name('pengumuman.index');
    Route::get('/pengumuman/{id}', 'show')->name('pengumuman.show');
});


// --- Kalender Akademik ---
Route::get('/kalender-akademik', fn() => view('kalender_akademik'))->name('kalender.index');
Route::get('/kalender-akademik/download', function () {
    $data = ['title' => 'Kalender Akademik 2025/2026', 'date' => date('d F Y')];
    $pdf = Pdf::loadView('kalender_akademik_pdf', $data);
    $pdf->setPaper('A4', 'portrait');
    return $pdf->download('Kalender_Akademik_Kampus_LSP_2025.pdf');
})->name('kalender.download');


// --- Halaman Statis (Tentang & Fasilitas) ---
Route::prefix('tentang')->name('tentang.')->group(function () {
    Route::view('/sejarah', 'tentang.sejarah')->name('sejarah');
    Route::view('/visi-misi', 'tentang.visi_misi')->name('visi_misi');
    Route::view('/struktur-organisasi', 'tentang.struktur_organisasi')->name('struktur_organisasi');
    Route::view('/dosen', 'tentang.dosen')->name('dosen');
    Route::view('/fasilitas', 'tentang.fasilitas')->name('fasilitas');
});

Route::prefix('fasilitas')->name('fasilitas.')->group(function () {
    Route::view('/masjid', 'ibadah.masjid')->name('masjid');
    Route::view('/kapel', 'ibadah.gereja')->name('kapel');
    Route::view('/graha', 'ibadah.vihara')->name('graha');
    Route::view('/lab-komputer', 'fasilitas.lab_komputer')->name('lab_komputer');
    Route::view('/library', 'fasilitas.library')->name('library');
    Route::view('/smart-classroom', 'fasilitas.smart_classroom')->name('smart_classroom');
    Route::view('/auditorium', 'fasilitas.auditorium')->name('auditorium');
    Route::view('/coworking-space', 'fasilitas.coworking_space')->name('coworking_space');
    Route::view('/ibadah', 'fasilitas.ibadah')->name('ibadah');
});

// --- Info Prodi ---
Route::prefix('prodi')->name('prodi.')->group(function () {
    Route::view('/bisnis-digital', 'prodi.bisnis_digital')->name('bisnis-digital');
    Route::view('/informatika', 'prodi.informatika')->name('informatika');
    Route::view('/sistem-informasi', 'prodi.sistem_informasi')->name('sistem-informasi');
});


/*
|--------------------------------------------------------------------------
| 2. AUTHENTICATED ROUTES (Mahasiswa/User Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', \App\Http\Middleware\CheckAccountStatus::class])->group(function () {

    // Dashboard & Status
    Route::get('/status-pendaftaran', [StatusController::class, 'index'])->name('user.status');
    
    // Cetak Kwitansi Mandiri (User)
    Route::get('/bukti-pembayaran/{id}/cetak', [AdminPaymentReceiptController::class, 'printPDF'])->name('receipts.print');

    // Verifikasi Manual di Dashboard User
    Route::post('/status-pendaftaran/verify-manual', [AdminPaymentReceiptController::class, 'verifyManual'])
        ->name('verification.manual_check.auth');

    // Profile Management
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // --- Flow Pendaftaran (Step Middleware) ---
    Route::middleware(['pendaftaran.step'])->group(function () {
        
        // Biodata
        Route::controller(PendaftaranController::class)->group(function() {
            Route::get('/pendaftaran', 'index')->name('pendaftaran.create');
            Route::post('/pendaftaran', 'store')->name('pendaftaran.store');
            Route::get('/pendaftaran/validasi', 'validasi')->name('pendaftaran.validasi');
            
            // Biaya
            Route::get('/pendaftaran/biaya', 'biaya')->name('pendaftaran.biaya');
            Route::post('/pendaftaran/biaya', 'storeBiaya')->name('pendaftaran.biaya.store');
        });

        // Finalisasi
        Route::get('/pendaftaran/selesai', function () {
            $user = Auth::user();
            if ($user->pendaftar && $user->pendaftar->pembayaran && $user->pendaftar->pembayaran->status == 'valid') {
                return view('pendaftaran_already');
            }
            return view('pendaftaran_validasi_biaya');
        })->name('pendaftaran.selesai');

        // Konfirmasi
        Route::get('/pendaftaran/konfirmasi', function () {
            $user = Auth::user();
            $isBiodataValid = $user->pendaftar && $user->pendaftar->status == 'verified';
            $isBiayaValid = $user->pendaftar && $user->pendaftar->pembayaran && $user->pendaftar->pembayaran->status == 'valid';

            if ($isBiodataValid && $isBiayaValid) {
                return view('pendaftaran_konfirmasi');
            }
            return redirect()->route('user.status')
                ->with('error', 'Akses ditolak. Tahapan belum selesai.');
        })->name('pendaftaran.konfirmasi');
    });
});


/*
|--------------------------------------------------------------------------
| 3. ADMIN ROUTES (Hanya Admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', \App\Http\Middleware\CheckAccountStatus::class, \App\Http\Middleware\IsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // Validasi Pembayaran Manual Screen
        Route::view('/validasi-pembayaran-manual', 'validasipembayaran')->name('validasi-manual');

        // --- User Management ---
        Route::controller(AdminController::class)->group(function () {
            Route::get('/users', 'index')->name('users');
            Route::get('/users/{id}/edit', 'edit')->name('users.edit');
            Route::put('/users/{id}', 'update')->name('users.update');
            Route::patch('/users/{id}/role', 'updateRole')->name('users.updateRole');
            Route::delete('/users/{id}/delete', 'destroyUserManagement')->name('users.delete');

            // Verifikasi Akun Baru
            Route::prefix('verifikasi-akun')->group(function () {
                Route::get('/', 'verifikasiAkun')->name('verifikasi_akun');
                Route::patch('/{id}/approve', 'processVerifikasiAkun')->name('verifikasi.approve');
                Route::patch('/{id}/reject', 'rejectVerifikasiAkun')->name('verifikasi.reject');
                Route::delete('/{id}/delete', 'destroyUser')->name('verifikasi_akun.delete');
            });
        });

        // --- Pendaftaran Management ---
        Route::controller(PendaftaranController::class)->group(function () {
            Route::get('/pendaftar', 'pendaftar')->name('pendaftar');
            Route::get('/pendaftar/{id}', 'showPendaftar')->name('pendaftar.show');
            Route::get('/pendaftar/{id}/edit', 'editPendaftar')->name('pendaftar.edit');
            Route::patch('/pendaftar/{id}', 'updatePendaftar')->name('pendaftar.update');
            Route::delete('/pendaftar/{id}/delete', 'destroyPendaftar')->name('pendaftar.destroy');
            Route::patch('/pendaftar/{id}/verify/{status}', 'verifyPendaftar')->name('pendaftar.verify');
            
            // Verifikasi Pembayaran
            Route::get('/pendaftar/{id}/pembayaran', 'showPayment')->name('pendaftar.show_payment');
            Route::patch('/pendaftar/{id}/verifikasi-pembayaran', 'verifyPayment')->name('pendaftar.verify_payment');
        });

        // --- Manajemen Kwitansi & Pembayaran (Receipts) ---
        Route::controller(AdminPaymentReceiptController::class)->group(function () {
            // List & Detail
            Route::get('/bukti-pembayaran', 'index')->name('receipts.index');
            Route::get('/bukti-pembayaran/{id}/detail', 'show')->name('receipts.show');

            // Create & Store (Generate RSA Signature)
            Route::get('/pendaftar/{id}/buat-kwitansi', 'create')->name('pendaftar.create_receipt');
            Route::post('/pendaftar/{id}/buat-kwitansi', 'store')->name('pendaftar.store_receipt');
            
            // Cetak PDF (Admin view)
            // Cetak PDF (Admin view)
Route::get('/receipt/{id}/print', 'printPDF')->name('receipts.print');
        });

        // --- Digital Signature Management ---
        Route::resource('signatures', AdminSignatureController::class)->only(['index', 'store', 'destroy']);

        // --- Pengumuman CMS ---
        Route::resource('pengumuman', PengumumanController::class);

        // --- Utility Routes ---
        Route::view('/program-studi', 'admin.program_studi')->name('program_studi');

        // --- RSA Key Generator (Dev Mode Only) ---
        Route::get('/generate-keys', function () {
            // NOTE: In production, ensure this route is protected or removed.
            $config = [
                "digest_alg" => "sha256",
                "private_key_bits" => 2048,
                "private_key_type" => OPENSSL_KEYTYPE_RSA,
            ];
            $res = openssl_pkey_new($config);
            openssl_pkey_export($res, $privateKey);
            $publicKey = openssl_pkey_get_details($res)["key"];

            Storage::makeDirectory('keys');
            Storage::put('keys/private.pem', $privateKey);
            Storage::put('keys/public.pem', $publicKey);

            return "Kunci RSA berhasil dibuat di storage/app/keys!";
        })->name('generate_keys');
    });
    Route::get('/fix-null-codes', function() {
    // Ambil semua data yang verification_code-nya masih NULL
    $receipts = BuktiPenerimaan::whereNull('verification_code')->get();

    foreach($receipts as $receipt) {
        // Update dengan kode baru
        $receipt->update([
            'verification_code' => 'VF-' . strtoupper(Str::random(6))
        ]);
    }

    return "Berhasil memperbaiki " . $receipts->count() . " data kwitansi.";
});

require __DIR__ . '/auth.php';