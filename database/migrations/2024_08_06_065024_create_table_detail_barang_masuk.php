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
        Schema::create('detail_barang_masuk', function (Blueprint $table) {
            $table->id('detail_barang_masuk_id');
            $table->string('kode_detail_barang_masuk')->unique();
            $table->unsignedBigInteger('barang_masuk_id')->index();
            $table->unsignedBigInteger('barang_id')->index();
            $table->integer('jumlah');
            $table->string('keterangan');
            $table->timestamps();
            $table->foreign('barang_masuk_id')->references('barang_masuk_id')->on('barang_masuk');
            $table->foreign('barang_id')->references('barang_id')->on('data_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_barang_masuk');
    }
};
