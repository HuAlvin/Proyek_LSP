<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/pengumuman', [PengumumanController::class, 'publicIndex'])->name('pengumuman.index');
Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');

Route::get('/kalender-akademik', fn() => view('kalender_akademik'))->name('kalender.index');
Route::get('/kalender-akademik/download', function () {
    $data = ['title' => 'Kalender Akademik 2025/2026', 'date' => date('d F Y')];
    $pdf = Pdf::loadView('kalender_akademik_pdf', $data);
    $pdf->setPaper('A4', 'portrait');
    return $pdf->download('Kalender_Akademik_Kampus_LSP_2025.pdf');
})->name('kalender.download');

Route::prefix('tentang')->name('tentang.')->group(function () {
    Route::get('/sejarah', fn() => view('tentang.sejarah'))->name('sejarah');
    Route::get('/visi-misi', fn() => view('tentang.visi_misi'))->name('visi_misi');
    Route::get('/struktur-organisasi', fn() => view('tentang.struktur_organisasi'))->name('struktur_organisasi');
    Route::get('/dosen', fn() => view('tentang.dosen'))->name('dosen');
    Route::get('/fasilitas', fn() => view('tentang.fasilitas'))->name('fasilitas');
});

Route::get('/fasilitas/masjid', function () {
    return view('ibadah.masjid');
})->name('fasilitas.masjid');

Route::get('/fasilitas/kapel', function () {
    return view('ibadah.gereja');
})->name('fasilitas.kapel');

Route::get('/fasilitas/graha', function () {
    return view('ibadah.vihara');
})->name('fasilitas.graha');

Route::prefix('fasilitas')->name('fasilitas.')->group(function () {
    Route::get('/lab-komputer', fn() => view('fasilitas.lab_komputer'))->name('lab_komputer');
    Route::get('/library', fn() => view('fasilitas.library'))->name('library');
    Route::get('/smart-classroom', fn() => view('fasilitas.smart_classroom'))->name('smart_classroom');
    Route::get('/auditorium', fn() => view('fasilitas.auditorium'))->name('auditorium');
    Route::get('/coworking-space', fn() => view('fasilitas.coworking_space'))->name('coworking_space');
    Route::get('/ibadah', fn() => view('fasilitas.ibadah'))->name('ibadah');
});

Route::prefix('prodi')->name('prodi.')->group(function () {
    Route::get('/bisnis-digital', fn() => view('prodi.bisnis_digital'))->name('bisnis-digital');
    Route::get('/informatika', fn() => view('prodi.informatika'))->name('informatika');
    Route::get('/sistem-informasi', fn() => view('prodi.sistem_informasi'))->name('sistem-informasi');
});



Route::middleware(['auth', 'verified', \App\Http\Middleware\CheckAccountStatus::class])->group(function () {

    Route::get('/status-pendaftaran', [StatusController::class, 'index'])->name('user.status');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['pendaftaran.step'])->group(function () {
        Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.create');
        Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

        Route::get('/pendaftaran/validasi', [PendaftaranController::class, 'validasi'])->name('pendaftaran.validasi');

        Route::get('/pendaftaran/biaya', [PendaftaranController::class, 'biaya'])->name('pendaftaran.biaya');
        Route::post('/pendaftaran/biaya', [PendaftaranController::class, 'storeBiaya'])->name('pendaftaran.biaya.store');

        Route::get('/pendaftaran/selesai', function () {
            $user = Auth::user();
            if ($user->pendaftar && $user->pendaftar->pembayaran && $user->pendaftar->pembayaran->status == 'valid') {
                return view('pendaftaran_already');
            }
            return view('pendaftaran_validasi_biaya');
        })->name('pendaftaran.selesai');

        Route::get('/pendaftaran/konfirmasi', function () {
            $user = Auth::user();

            $isBiodataValid = $user->pendaftar && $user->pendaftar->status == 'verified';
            $isBiayaValid = $user->pendaftar && $user->pendaftar->pembayaran && $user->pendaftar->pembayaran->status == 'valid';

            if ($isBiodataValid && $isBiayaValid) {
                return view('pendaftaran_konfirmasi');
            }

            return redirect()->route('user.status')
                ->with('error', 'Akses ditolak. Anda belum menyelesaikan seluruh tahapan pendaftaran (Data & Biaya belum tervalidasi).');

        })->name('pendaftaran.konfirmasi');
    });
});



Route::middleware(['auth', 'verified', \App\Http\Middleware\CheckAccountStatus::class, \App\Http\Middleware\IsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::controller(AdminController::class)->group(function () {
            Route::get('/users', 'index')->name('users');

            Route::get('/users/{id}/edit', 'edit')->name('users.edit');
            Route::put('/users/{id}', 'update')->name('users.update');

            Route::patch('/users/{id}/role', 'updateRole')->name('users.updateRole');
            Route::delete('/users/{id}/delete', 'destroyUserManagement')->name('users.delete');

            Route::get('/verifikasi-akun', 'verifikasiAkun')->name('verifikasi_akun');
            Route::patch('/verifikasi-akun/{id}/approve', 'processVerifikasiAkun')->name('verifikasi.approve');
            Route::patch('/verifikasi-akun/{id}/reject', 'rejectVerifikasiAkun')->name('verifikasi.reject');
            Route::delete('/verifikasi-akun/{id}/delete', 'destroyUser')->name('verifikasi_akun.delete');
        });

        Route::controller(PendaftaranController::class)->group(function () {
            Route::get('/pendaftar', 'pendaftar')->name('pendaftar');

            Route::get('/pendaftar/{id}/edit', 'editPendaftar')->name('pendaftar.edit');
            Route::patch('/pendaftar/{id}', 'updatePendaftar')->name('pendaftar.update');
            Route::delete('/pendaftar/{id}/delete', 'destroyPendaftar')->name('pendaftar.destroy');

            Route::get('/pendaftar/{id}', 'showPendaftar')->name('pendaftar.show');
            Route::patch('/pendaftar/{id}/verify/{status}', 'verifyPendaftar')->name('pendaftar.verify');

            Route::get('/pendaftar/{id}/pembayaran', 'showPayment')->name('pendaftar.show_payment');
            Route::patch('/pendaftar/{id}/verifikasi-pembayaran', 'verifyPayment')->name('pendaftar.verify_payment');
        });

        Route::prefix('pengumuman')->name('pengumuman.')->controller(PengumumanController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
        Route::get('/program-studi', fn() => view('admin.program_studi'))->name('program_studi');
    });
require __DIR__ . '/auth.php';