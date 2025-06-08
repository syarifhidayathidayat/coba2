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
            $table->string('nama_penyedia');
            $table->string('npwp');
            $table->string('rekening');
            $table->text('alamat');
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
