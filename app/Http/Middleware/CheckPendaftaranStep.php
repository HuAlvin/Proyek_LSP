<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPendaftaranStep
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $pendaftar = $user->pendaftar;
        $currentRoute = $request->route()->getName();

        if (!$pendaftar) {
            $allowedRoutes = ['pendaftaran.create', 'pendaftaran.store'];
            
            if (!in_array($currentRoute, $allowedRoutes)) {
                return redirect()->route('pendaftaran.create');
            }
            return $next($request);
        }

        if ($pendaftar->status == 'pending') {

            if ($currentRoute != 'pendaftaran.validasi') {
                return redirect()->route('pendaftaran.validasi');
            }
            return $next($request);
        }

        if ($pendaftar->status == 'rejected') {
            if ($currentRoute != 'pendaftaran.validasi') {
                return redirect()->route('pendaftaran.validasi');
            }
            return $next($request);
        }

        if ($pendaftar->status == 'verified') {

            $pembayaran = $pendaftar->pembayaran;

            if (!$pembayaran) {
                $allowedRoutes = ['pendaftaran.biaya', 'pendaftaran.biaya.store'];

                if (!in_array($currentRoute, $allowedRoutes)) {
                    return redirect()->route('pendaftaran.biaya');
                }
            } else {
                
                if ($pembayaran->status == 'invalid') {
                    $allowedRoutes = ['pendaftaran.biaya', 'pendaftaran.biaya.store'];
                    if (!in_array($currentRoute, $allowedRoutes)) {
                        return redirect()->route('pendaftaran.biaya')->with('error', 'Bukti pembayaran sebelumnya ditolak. Silakan upload ulang.');
                    }
                } else {
                    if ($currentRoute != 'pendaftaran.selesai' && $currentRoute != 'pendaftaran.konfirmasi') {
                        return redirect()->route('pendaftaran.selesai');
                    }
                }
            }
            
            return $next($request);
        }

        return $next($request);
    }
}