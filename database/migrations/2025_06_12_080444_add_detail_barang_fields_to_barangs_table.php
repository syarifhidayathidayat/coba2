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
        Schema::table('barangs', function (Blueprint $table) {
            // Hanya tambahkan kolom jika belum ada
            if (!Schema::hasColumn('barangs', 'harga')) {
                $table->integer('harga')->nullable()->after('qty');
            }

            if (!Schema::hasColumn('barangs', 'total')) {
                $table->integer('total')->nullable()->after('harga');
            }

            if (!Schema::hasColumn('barangs', 'ongkos_kirim')) {
                $table->integer('ongkos_kirim')->nullable()->after('total');
            }

            // Jangan tambahkan penempatan_id lagi, karena sudah ada
        });
    }

    public function down()
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn(['harga', 'total', 'ongkos_kirim']);
        });
    }
};
