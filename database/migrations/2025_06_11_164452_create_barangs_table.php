<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sp_id'); // foreign key ke tabel sps
            $table->string('nama_barang');
            $table->integer('qty');
            $table->timestamps();

            $table->foreign('sp_id')->references('id')->on('sps')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
