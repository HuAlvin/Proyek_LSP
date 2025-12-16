<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    use HasFactory;

    protected $table = 'kwitansis';

    protected $fillable = [
        'pendaftar_id',
        'no_referensi',
        'nominal',
        'keterangan',
        'tanggal_terima',
        'admin_name',
        'digital_signature'
    ];

    // Casting agar tipe data tanggal otomatis jadi objek Carbon
    protected $casts = [
        'tanggal_terima' => 'date',
        'nominal' => 'decimal:2',
    ];

    /**
     * Relasi ke Model Pendaftar
     * Agar di PDF bisa panggil: $receipt->pendaftar->name
     */
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id');
    }

    /**
     * Boot function untuk generate No Referensi otomatis
     * Format: KWT-{TAHUN}{BULAN}-{RUMUS_RANDOM}
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Jika no_referensi belum diisi manual, kita buatkan otomatis
            if (empty($model->no_referensi)) {
                $now = now();
                // Contoh: KWT-202512-0001 (Perlu logika counter, ini versi simple random unique)
                $model->no_referensi = 'KWT-' . $now->format('Ym') . '-' . strtoupper(substr(uniqid(), -5));
            }
        });
    }
}