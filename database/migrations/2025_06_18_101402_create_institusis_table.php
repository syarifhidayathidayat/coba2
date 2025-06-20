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
            $table->string('sp_dipa')->nullable();
            $table->string('kode_institusi')->unique();           
            $table->timestamps();
            $table->string('tanggal_mulai')->nullable();
            $table->string('tanggal_selesai')->nullable();
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
