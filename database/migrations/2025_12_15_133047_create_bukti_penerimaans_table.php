<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bukti_penerimaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftar_id')->constrained('pendaftar')->onDelete('cascade');

            $table->string('no_referensi')->unique();
            $table->decimal('nominal', 12, 2);
            $table->date('tanggal_terima');
            $table->string('keterangan')->nullable();
            $table->string('file_path')->nullable();
            $table->string('admin_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bukti_penerimaans');
    }
};