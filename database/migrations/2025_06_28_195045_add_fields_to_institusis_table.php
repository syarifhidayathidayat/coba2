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
            $table->string('kode_institusi')->nullable()->after('fax');
        });
    }
    public function down(): void
    {
        Schema::table('institusis', function (Blueprint $table) {
            $table->dropColumn([
                'kode_institusi',
            ]);
        });
    }
};
