<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('paket_pekerjaan', function (Blueprint $table) {
            $table->year('tahun_anggaran')->after('nama_paket');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paket_pekerjaan', function (Blueprint $table) {
            $table->dropColumn('tahun_anggaran');
        });
    }
};
