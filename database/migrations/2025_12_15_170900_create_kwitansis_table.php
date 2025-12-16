<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kwitansis', function (Blueprint $table) {
            $table->id();
            
            // --- PERBAIKAN UTAMA DI SINI ---
            // 1. foreignId creates UNSIGNED BIGINT (Cocok dengan $table->id() di tabel pendaftar)
            // 2. constrained('pendaftar') memaksa laravel melihat tabel 'pendaftar' (bukan pendaftars)
            $table->foreignId('pendaftar_id')
                  ->constrained('pendaftar') // <--- PENTING: Nama tabel harus spesifik
                  ->onDelete('cascade');
            
            $table->string('no_referensi')->unique();
            $table->decimal('nominal', 15, 2);
            $table->string('keterangan')->nullable();
            $table->date('tanggal_terima');
            $table->string('admin_name');
            $table->text('digital_signature')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kwitansis');
    }
};