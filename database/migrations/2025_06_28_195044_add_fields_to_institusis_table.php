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
        Schema::table('institusis', function (Blueprint $table) {
            $table->string('no_telp')->nullable()->after('alamat');
            $table->string('fax')->nullable()->after('no_telp');
            $table->date('tanggal_sp_dipa')->nullable()->after('dipa');
            $table->string('no_sk_pejabat')->nullable()->after('sp_dipa');
            $table->date('tanggal_sk_pejabat')->nullable()->after('no_sk_pejabat');
            $table->string('upload_sk_pejabat')->nullable()->after('tanggal_sk_pejabat');
        });
    }

    public function down(): void
    {
        Schema::table('institusis', function (Blueprint $table) {
            $table->dropColumn([
                'no_telp',
                'fax',
                'tanggal_sp_dipa',
                'no_sk_pejabat',
                'tanggal_sk_pejabat',
                'upload_sk_pejabat'
            ]);
        });
    }
};
