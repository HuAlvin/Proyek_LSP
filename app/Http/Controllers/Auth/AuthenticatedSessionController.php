<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException; // <--- INI YANG BENAR
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && is_null($user->email_verified_at)) {
            throw ValidationException::withMessages([
                'email' => 'Akun Anda belum diverifikasi. Silakan cek inbox email Anda untuk melakukan verifikasi terlebih dahulu.',
            ]);
        }
        $request->authenticate();

        $request->session()->regenerate();
        if ($user->role === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->intended(route('user.status'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}