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
            $table->unsignedBigInteger('penempatan_id')->after('qty');
            $table->foreign('penempatan_id')->references('id')->on('penempatans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign(['penempatan_id']);
            $table->dropColumn('penempatan_id');
        });
    }
};
