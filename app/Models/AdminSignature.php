<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSignature extends Model
{
    use HasFactory;

    protected $table = 'admin_signatures'; // Pastikan nama tabel sesuai

    protected $fillable = [
        'user_id',
        'file_path',
        'rsa_signature', // <--- Tambahkan ini
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}