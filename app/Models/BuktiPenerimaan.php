<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPenerimaan extends Model
{
    use HasFactory;

    protected $table = 'bukti_penerimaans';

    protected $fillable = [
        'pendaftar_id',
        'no_referensi',
        'nominal',
        'tanggal_terima',
        'keterangan',
        'file_path',
        'admin_name',
        'digital_signature',
        'verification_code', // <--- JANGAN LUPA TAMBAHKAN INI
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
    public function buktiPenerimaan()
    {
        return $this->hasOne(BuktiPenerimaan::class);
    }
}