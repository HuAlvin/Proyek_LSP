<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bukti_pembayaran', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pendaftar_id')
                  ->constrained('pendaftar')
                  ->onDelete('cascade');

            $table->string('gambar');
            $table->date('tanggal_bayar');
            $table->decimal('jumlah_bayar', 10, 2)->nullable();

            $table->enum('status', ['pending', 'valid', 'invalid'])->default('pending');
            $table->text('catatan_admin')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bukti_pembayaran');
    }
};