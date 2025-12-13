<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';

    protected $fillable = [
        'user_id',
        'name', 
        'email', 
        'nik', 
        'phone', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'gender', 
        'agama', 
        'alamat', 
        'prodi', 
        'ijazah', 
        'foto', 
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pembayaran(): HasOne
    {
        return $this->hasOne(BuktiPembayaran::class, 'pendaftar_id', 'id');
    }
}