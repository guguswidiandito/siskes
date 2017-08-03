<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_rekam');
            $table->string('tgl_rekam');
            $table->integer('pasien_id')->unsigned();
            $table->integer('dokter_id')->unsigned();
            $table->string('poli');
            $table->integer('user_id')->unsigned();
            $table->string('keluhan');
            $table->string('diagnosa');
            $table->string('theraphy');
            $table->integer('biaya');
            $table->string('status');
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekams');
    }
}
