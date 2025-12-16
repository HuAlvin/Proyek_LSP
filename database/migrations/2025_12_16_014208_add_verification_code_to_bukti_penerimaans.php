<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bukti_penerimaans', function (Blueprint $table) {
            // Kode unik pendek (misal: VFR-9X2M-PL5)
            $table->string('verification_code', 20)->unique()->nullable()->after('no_referensi');
        });
    }

    public function down()
    {
        Schema::table('bukti_penerimaans', function (Blueprint $table) {
            $table->dropColumn('verification_code');
        });
    }
};
