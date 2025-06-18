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
        Schema::create('institusis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_institusi');
            $table->string('alamat');
            $table->string('nama_ppk_52')->nullable();
            $table->string('nip_ppk_52')->nullable();
            $table->string('nama_ppk_53')->nullable();
            $table->string('nip_ppk_53')->nullable();
            $table->string('nama_pejabat_pengadaan_52')->nullable();
            $table->string('nip_pejabat_pengadaan_52')->nullable();
            $table->string('nama_pejabat_pengadaan_53')->nullable();
            $table->string('nip_pejabat_pengadaan_53')->nullable();
            $table->string('nama_bendahara')->nullable();
            $table->string('nip_bendahara')->nullable();
            $table->string('dipa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institusis');
    }
};
