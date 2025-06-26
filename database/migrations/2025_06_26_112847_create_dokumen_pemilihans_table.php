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
        Schema::create('dokumen_pemilihans', function (Blueprint $table) {
            $table->id();

            // Undangan
            $table->string('undangan_nomor')->nullable();
            $table->date('undangan_tanggal')->nullable();
            $table->decimal('hps', 20, 2)->nullable();
            $table->date('undangan_pemasukan_tgl_mulai')->nullable();
            $table->date('undangan_pemasukan_tgl_selesai')->nullable();
            $table->time('undangan_pemasukan_jam')->nullable();
            $table->date('undangan_evaluasi_tgl_mulai')->nullable();
            $table->date('undangan_evaluasi_tgl_selesai')->nullable();
            $table->time('undangan_evaluasi_jam')->nullable();
            $table->string('undangan_spk_hari')->nullable();
            $table->date('undangan_spk_tanggal')->nullable();
            $table->text('uraian_paket')->nullable();
            $table->string('no_surat_izin_usaha')->nullable();
            $table->string('masa_berlaku_penawaran')->nullable();
            $table->string('bidang_usaha')->nullable();
            $table->string('jangka_waktu_penyerahan')->nullable();

            // BA Pembukaan Penawaran
            $table->string('ba_pembukaan_nomor')->nullable();
            $table->string('ba_pembukaan_hari')->nullable();
            $table->date('ba_pembukaan_tanggal')->nullable();
            $table->boolean('ba_pembukaan_surat_penawaran')->default(false);
            $table->boolean('ba_pembukaan_dok_teknis')->default(false);
            $table->boolean('ba_pembukaan_syarat')->default(false);
            $table->boolean('ba_pembukaan_lain')->default(false);
            $table->text('ba_pembukaan_keterangan')->nullable();

            // BA Klarifikasi & Negosiasi
            $table->string('ba_klarifikasi_nomor')->nullable();
            $table->string('ba_klarifikasi_hari')->nullable();
            $table->date('ba_klarifikasi_tanggal')->nullable();
            $table->decimal('ba_klarifikasi_harga_penawaran', 20, 2)->nullable();
            $table->decimal('ba_klarifikasi_harga_negosiasi', 20, 2)->nullable();

            // BA Hasil Pengadaan Langsung
            $table->string('ba_hasil_nomor')->nullable();
            $table->string('ba_hasil_hari')->nullable();
            $table->date('ba_hasil_tanggal')->nullable();
            $table->boolean('ba_hasil_penawaran_admin')->default(false);
            $table->boolean('ba_hasil_penawaran_teknis')->default(false);
            $table->boolean('ba_hasil_penawaran_biaya')->default(false);
            $table->text('ba_hasil_penawaran_keterangan')->nullable();
            $table->decimal('ba_hasil_harga_koreksi', 20, 2)->nullable();
            $table->decimal('ba_hasil_harga_final', 20, 2)->nullable();
            $table->text('ba_hasil_evaluasi_admin')->nullable();
            $table->text('ba_hasil_evaluasi_teknis')->nullable();
            $table->text('ba_hasil_evaluasi_harga')->nullable();

            // Nota Dinas
            $table->string('nota_dinas_nomor')->nullable();
            $table->date('nota_dinas_tanggal')->nullable();

            // Relasi ke SP
            $table->foreignId('sp_id')->nullable()->constrained('sps')->nullOnDelete();

            // Tracking
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_pemilihans');
    }
};
