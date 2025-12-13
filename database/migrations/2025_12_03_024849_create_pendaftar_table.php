<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();

            $table->string('user_id', 8)->unique(); 

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->string('name');
            $table->string('email');
            $table->string('nik', 16);
            $table->string('phone', 20);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('gender', ['L', 'P']);
            $table->string('agama');
            $table->text('alamat');

            $table->string('prodi');

            $table->string('ijazah');
            $table->string('foto');

            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftar');
    }
};