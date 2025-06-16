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
            $table->string('jenis_akun')->nullable()->after('sisa_pagu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paket_pekerjaan', function (Blueprint $table) {
            $table->dropColumn('jenis_akun');
        });
    }
};
