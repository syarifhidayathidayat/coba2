<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sps', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_sp');
            $table->foreignId('penyedia_id')->constrained('penyedias');
            $table->string('nama_paket');
            $table->date('tanggal');
            $table->decimal('total_kontrak', 15, 2);
            $table->date('mulai_pekerjaan');
            $table->integer('masa');
            $table->date('akhir_pekerjaan');
            $table->string('metode');
            $table->decimal('total_pagu', 15, 2);
            $table->string('akun');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sps');
    }
};
