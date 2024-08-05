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
        Schema::create('fungsi_jatimbalinus', function (Blueprint $table) {
            $table->id('fungsi_id');
            $table->string('kode_fungsi', 10)->unique();
            $table->string('nama_fungsi', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fungsi_jatimbalinus');
    }
};
