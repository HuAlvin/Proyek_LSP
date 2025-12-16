<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('verification_fails')->default(0); // Hitung jumlah salah
            $table->timestamp('verification_blocked_until')->nullable(); // Waktu blokir habis
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['verification_fails', 'verification_blocked_until']);
        });
    }
};
