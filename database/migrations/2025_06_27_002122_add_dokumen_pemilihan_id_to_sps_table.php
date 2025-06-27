<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('sps', function (Blueprint $table) {
            $table->foreignId('dokumen_pemilihan_id')
                ->nullable()
                ->constrained('dokumen_pemilihans')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('sps', function (Blueprint $table) {
            $table->dropForeign(['dokumen_pemilihan_id']);
            $table->dropColumn('dokumen_pemilihan_id');
        });
    }
};
