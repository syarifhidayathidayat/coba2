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
        Schema::create('paket_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->string('max');
            $table->string('kode_rup');
            $table->decimal('pagu', 15, 2);
            $table->integer('qty');
            $table->decimal('outstanding_kontrak', 15, 2);
            $table->decimal('realisasi', 15, 2);
            $table->decimal('sisa_pagu', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_pekerjaan');
    }
};
