<?php

namespace App\Http\Controllers;

use App\Models\BuktiPembayaran;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->status_verifikasi != 'verified') {
            return view('pendaftaran_notvalidate');
        }

        if ($user->pendaftar) {
            if ($user->pendaftar->status == 'pending') {
                return redirect()->route('pendaftaran.validasi');
            }

            return view('pendaftaran_already');
        }

        return view('pendaftaran');
    }

    public function store(Request $request)
    {
        if (Auth::user()->status_verifikasi != 'verified') {
            return redirect()->route('pendaftaran.index');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:pendaftar,email',
            'nik' => 'required|numeric|digits:16',
            'phone' => 'required|numeric',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required|in:L,P',
            'agama' => 'required|string',
            'alamat' => 'required|string|min:10',
            'prodi' => 'required|string',
            'ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $pathIjazah = $request->file('ijazah')->store('pendaftar/ijazah', 'public');
        $pathFoto = $request->file('foto')->store('pendaftar/foto', 'public');

        $pendaftar = Pendaftar::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'phone' => $request->phone,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'prodi' => $request->prodi,
            'ijazah' => $pathIjazah,
            'foto' => $pathFoto,
            'status' => 'pending',
        ]);

        session(['id_pendaftar_baru' => $pendaftar->id]);

        return redirect()->route('pendaftaran.validasi')->with('success', 'Data berhasil dikirim dan sedang dalam proses validasi.');
    }

    public function validasi()
    {
        $user = Auth::user();

        if (!$user->pendaftar) {
            return redirect()->route('pendaftaran.index')->with('error', 'Silakan isi formulir terlebih dahulu.');
        }

        return view('pendaftaran_validasi_data', [
            'pendaftar' => $user->pendaftar
        ]);
    }

    public function biaya()
    {
        if (!session()->has('id_pendaftar_baru')) {
            if (Auth::user()->pendaftar) {
                return view('pendaftaran_biaya');
            }
            return redirect()->route('pendaftaran.index');
        }
        return view('pendaftaran_biaya');
    }

    public function paymentForm()
    {
        $pendaftar = Auth::user()->pendaftar;
        if (!$pendaftar) {
            return redirect()->route('pendaftaran.index')->with('error', 'Silakan lengkapi data diri terlebih dahulu.');
        }
        return view('pendaftaran_pembayaran');
    }

    public function storeBiaya(Request $request)
    {
        $user = Auth::user();
        $pendaftar = $user->pendaftar;

        if (!$pendaftar) {
            return abort(404, 'Data pendaftar tidak ditemukan.');
        }

        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $nominal = 0;
        if ($pendaftar->prodi == 'Teknik Informatika') {
            $nominal = 350000;
        } elseif ($pendaftar->prodi == 'Sistem Informasi' || $pendaftar->prodi == 'Bisnis Digital') {
            $nominal = 300000;
        }

        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('pembayaran', 'public');

            $pendaftar->pembayaran()->updateOrCreate(
                ['pendaftar_id' => $pendaftar->id],
                [
                    'gambar' => $path,
                    'tanggal_bayar' => now(),
                    'jumlah_bayar' => $nominal,
                    'status' => 'pending',
                    'catatan_admin' => null
                ]
            );

            return redirect()->route('pendaftaran.selesai');
        }

        return back()->with('error', 'Gagal mengupload file.');
    }

    public function konfirmasi()
    {
        return view('pendaftaran_konfirmasi');
    }


    public function pendaftar(Request $request)
    {
        $query = Pendaftar::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('prodi')) {
            $query->where('prodi', $request->prodi);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pendaftar = $query->latest()->paginate(10);

        return view('admin.data_pendaftar', compact('pendaftar'));
    }

    public function showPendaftar($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('admin.data_pendaftar_show', compact('pendaftar'));
    }

    public function verifyPendaftar(Request $request, $id, $status)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        
        if (in_array($status, ['verified', 'rejected'])) {
            $pendaftar->update(['status' => $status]);
            
            $msg = $status == 'verified' ? 'Pendaftar berhasil diterima!' : 'Pendaftar ditolak.';
            return redirect()->route('admin.pendaftar')->with('success', $msg);
        }

        return back()->with('error', 'Status tidak valid.');
    }

    public function showPayment($id)
    {
        $pendaftar = Pendaftar::with('pembayaran')->findOrFail($id);
        return view('admin.data_pendaftar_show_biaya', compact('pendaftar'));
    }

    public function verifyPayment(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        $statusBayar = ($request->status == 'verified') ? 'valid' : 'invalid';

        $pendaftar->pembayaran()->update([
            'status' => $statusBayar,
            'catatan_admin' => $request->catatan_admin
        ]);

        if ($statusBayar == 'valid') {
            $pendaftar->update(['status' => 'verified']);
        } else {
            $pendaftar->update(['status' => 'rejected']);
        }

        return back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
    public function editPendaftar($id)
    {
        $pendaftar = Pendaftar::with('pembayaran')->findOrFail($id);
        
        return view('admin.pendaftar_edit', compact('pendaftar'));
    }

    public function updatePendaftar(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|string|email|max:255',
            'nik'              => 'required|string|max:20',
            'phone'            => 'required|string|max:20',
            'tempat_lahir'     => 'required|string|max:255',
            'tanggal_lahir'    => 'required|date',
            'gender'           => 'required|string',
            'agama'            => 'required|string',
            'alamat'           => 'required|string',
            'prodi'            => 'required|string',
            'status'           => 'required|string',
            'ijazah'           => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto'             => 'nullable|image|max:2048',
            'bukti_pembayaran' => 'nullable|image|max:2048', 
        ]);

        $dataPendaftar = $request->except(['ijazah', 'foto', 'user_id', 'id', 'bukti_pembayaran']);

        if ($request->hasFile('ijazah')) {
            if ($pendaftar->ijazah && Storage::disk('public')->exists($pendaftar->ijazah)) {
                Storage::disk('public')->delete($pendaftar->ijazah);
            }
            $dataPendaftar['ijazah'] = $request->file('ijazah')->store('dokumen/ijazah', 'public');
        }

        if ($request->hasFile('foto')) {
            if ($pendaftar->foto && Storage::disk('public')->exists($pendaftar->foto)) {
                Storage::disk('public')->delete($pendaftar->foto);
            }
            $dataPendaftar['foto'] = $request->file('foto')->store('dokumen/foto', 'public');
        }

        $pendaftar->update($dataPendaftar);

        if ($request->hasFile('bukti_pembayaran')) {
            $pathBukti = $request->file('bukti_pembayaran')->store('dokumen/pembayaran', 'public');

            if ($pendaftar->pembayaran) {
                if ($pendaftar->pembayaran->gambar && Storage::disk('public')->exists($pendaftar->pembayaran->gambar)) {
                    Storage::disk('public')->delete($pendaftar->pembayaran->gambar);
                }

                $pendaftar->pembayaran->update([
                    'gambar' => $pathBukti
                ]);
            } else {
                BuktiPembayaran::create([
                    'pendaftar_id' => $pendaftar->id,
                    'gambar'       => $pathBukti,
                    'status'       => 'pending',
                ]);
            }
        }

        return redirect()->route('admin.pendaftar')->with('success', 'Data pendaftar dan bukti pembayaran berhasil diperbarui.');
    }
    public function destroyPendaftar($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $user = $pendaftar->user;

        if ($pendaftar->foto && Storage::disk('public')->exists($pendaftar->foto)) {
            Storage::disk('public')->delete($pendaftar->foto);
        }
        if ($pendaftar->ijazah && Storage::disk('public')->exists($pendaftar->ijazah)) {
            Storage::disk('public')->delete($pendaftar->ijazah);
        }

        if ($pendaftar->pembayaran && $pendaftar->pembayaran->gambar && Storage::disk('public')->exists($pendaftar->pembayaran->gambar)) {
            Storage::disk('public')->delete($pendaftar->pembayaran->gambar);
        }

        if ($user && $user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        if($user) {
            $user->delete();
        } else {
            $pendaftar->delete();
        }

        return redirect()->route('admin.pendaftar')->with('success', 'Data pendaftar berhasil dihapus permanen.');
    }
}