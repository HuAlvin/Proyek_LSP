<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_signatures', function (Blueprint $table) {
            $table->id();

            // 1. Foreign Key User (Sesuai kode Anda)
            $table->string('user_id', 8);
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            
            // 2. Lokasi File Gambar
            $table->string('file_path');

            // 3. TAMBAHAN PENTING: Kolom untuk RSA Signature
            // Gunakan tipe 'text' karena hasil enkripsi Base64 cukup panjang
            $table->text('rsa_signature')->nullable(); 

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_signatures');
    }
};