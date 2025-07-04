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
        Schema::table('sps', function (Blueprint $table) {
            $table->string('jenis_akun')->nullable()->after('akun'); // atau posisikan sesuai logika bro
        });
    }

    public function down()
    {
        Schema::table('sps', function (Blueprint $table) {
            $table->dropColumn('jenis_akun');
        });
    }
};
