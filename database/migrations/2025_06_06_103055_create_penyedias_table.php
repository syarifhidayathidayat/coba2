<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('penyedias', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyedia')->nullable();
            $table->string('nama_direktur_penyedia')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('website')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('rekening_bank')->nullable();
            $table->string('cabang_bank')->nullable();
            $table->string('rekening_atas_nama')->nullable();
            $table->string('npwp')->nullable();
            $table->string('dokumen_npwp')->nullable();
            $table->string('dokumen_ktp')->nullable();
            $table->string('dokumen_rekening_koran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyedias');
    }
};
