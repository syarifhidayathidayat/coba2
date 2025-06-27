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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip')->unique()->nullable();
            $table->string('jabatan');
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }
    // public function down(): void
    // {
    //     Schema::dropIfExists('pegawais');
    // }
    // public function update(): void
    // {
    //     Schema::updateIfExists('pegawais');
    // }
    
};
