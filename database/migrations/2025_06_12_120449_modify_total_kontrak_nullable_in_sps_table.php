<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('sps', function (Blueprint $table) {
            $table->date('akhir_pekerjaan')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('sps', function (Blueprint $table) {
            $table->decimal('total_kontrak', 15, 2)->nullable(false)->change();
            // atau hapus default jika sebelumnya pakai default
        });
    }
};
