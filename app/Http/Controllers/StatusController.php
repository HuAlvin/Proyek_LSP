<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftar;

class StatusController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $pendaftaran = Pendaftar::where('user_id', $user->id)->first();

        return view('status_pendaftaran', compact('user', 'pendaftaran'));
    }
}