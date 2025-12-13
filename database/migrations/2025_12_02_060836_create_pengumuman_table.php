<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();

            $table->string('user_id', 8)->index(); 

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->string('judul');
            $table->string('kategori')->nullable();
            $table->string('tags')->nullable();

            $table->text('deskripsi');
            $table->string('gambar')->nullable();

            $table->date('tgl_publish')->default(now());
            $table->enum('status', ['aktif', 'arsip'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};