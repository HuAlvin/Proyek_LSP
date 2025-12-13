<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuktiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'bukti_pembayaran';

    protected $fillable = [
        'pendaftar_id',
        'gambar',
        'tanggal_bayar',
        'jumlah_bayar',
        'status',
        'catatan_admin'
    ];

    public function pendaftar(): BelongsTo
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id', 'id');
    }
}