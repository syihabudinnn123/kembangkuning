<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkebunanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perkebunan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('warga_id');
            $table->string('jenis_perkebunan');
            $table->longText('deskripsi');
            $table->integer('luas_lahan');
            $table->date('waktu_tanam');
            $table->date('waktu_panen');
            $table->timestamps();

            $table->foreign('warga_id')->references('id')->on('warga')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perkebunan');
    }
}
