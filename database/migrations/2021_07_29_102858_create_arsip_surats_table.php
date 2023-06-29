<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->string('judul_surat');
            $table->string('tanggal_surat');
            $table->string('nomor_surat');
            $table->string('jenis_surat');
            $table->string('file_surat');
            $table->string('asal_tujuan');
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('kategori_surats')->cascadeOnUpdate()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip_surats');
    }
}
