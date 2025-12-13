<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Langsung kembalikan view dashboard tanpa mengirim data apapun.
        return view('admin.dashboard');
    }
    
    public function index(Request $request)
    {
        $query = User::where('status_verifikasi', 'verified');

        // Logika Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        $currentUserId = auth()->id();
        $query->orderByRaw("id = ? DESC", [$currentUserId]);
        $query->orderBy('name', 'ASC');

        $users = $query->paginate(10);

        return view('admin.profile_admin', compact('users'));
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->id == auth()->id()) {
            return back()->with('error', 'Anda tidak bisa mengubah role akun sendiri.');
        }

        $user->role = ($user->role === 'admin') ? 'user' : 'admin';
        $user->save();

        return back()->with('success', 'Role user berhasil diperbarui.');
    }

    public function verifikasiAkun(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $query->orderByRaw("FIELD(status_verifikasi, 'pending', 'verified', 'rejected')")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.verifikasi_akun', compact('users'));
    }

    public function processVerifikasiAkun($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'email_verified_at' => now(),
            'status_verifikasi' => 'verified'
        ]);

        return redirect()->back()->with('success', 'Akun berhasil disetujui dan diverifikasi!');
    }

    public function rejectVerifikasiAkun($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'email_verified_at' => null,
            'status_verifikasi' => 'rejected'
        ]);

        return redirect()->back()->with('success', 'Akun berhasil ditolak (Status: Rejected).');
    }

    public function destroyUserManagement($id)
    {
        $user = User::findOrFail($id);

        if ($user->id == auth()->id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus dari sistem.');
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Tidak dapat menghapus akun Admin dari menu ini.');
        }

        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return redirect()->back()->with('success', 'Akun berhasil dihapus permanen.');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.profile_admin_edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'email']);

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()->route('admin.users')->with('success', 'Data pengguna berhasil diperbarui.');
    }
}