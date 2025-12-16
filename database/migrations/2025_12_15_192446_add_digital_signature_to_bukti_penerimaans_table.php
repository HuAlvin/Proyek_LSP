<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bukti_penerimaans', function (Blueprint $table) {
            // Menambahkan kolom digital_signature tipe TEXT (karena base64 panjang)
            $table->text('digital_signature')->nullable()->after('admin_name');
        });
    }

    public function down(): void
    {
        Schema::table('bukti_penerimaans', function (Blueprint $table) {
            $table->dropColumn('digital_signature');
        });
    }
};