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
        Schema::create('basts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sp_id')->constrained('sps')->onDelete('cascade');
            $table->date('tanggal_bast');
            $table->string('nomor_bast')->unique();
            $table->string('nomor_bap')->unique();
            $table->string('nomor_bapem')->unique();
            $table->enum('status', ['draft', 'final'])->default('draft');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        // Tabel untuk detail barang yang diserahterimakan
        Schema::create('bast_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bast_id')->constrained()->onDelete('cascade');
            $table->foreignId('barang_id')->constrained()->onDelete('cascade');
            $table->integer('jumlah_serah_terima');
            $table->string('kondisi')->nullable(); // kondisi barang saat serah terima
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bast_barang');
        Schema::dropIfExists('basts');
    }
};
