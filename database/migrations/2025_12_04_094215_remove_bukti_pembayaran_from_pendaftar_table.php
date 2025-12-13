<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftar', function (Blueprint $table) {

            if (Schema::hasColumn('pendaftar', 'bukti_pembayaran')) {
                $table->dropColumn('bukti_pembayaran');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->string('bukti_pembayaran')->nullable();
        });
    }
};