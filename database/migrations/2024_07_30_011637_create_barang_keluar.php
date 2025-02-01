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
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id('barang_keluar_id');
            $table->string('kode_barang_keluar')->unique();
            $table->unsignedBigInteger('fungsi_id')->index();
            $table->unsignedBigInteger('sa_id')->index();
            $table->dateTime('tanggal_keluar');
            $table->timestamps();
            $table->foreign('fungsi_id')->references('fungsi_id')->on('fungsi_jatimbalinus');
            $table->foreign('sa_id')->references('sa_id')->on('sales_area');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
