<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailResepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_reseps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('resep_id')->unsigned();
            $table->integer('obat_id')->unsigned();
            $table->integer('jumlah');
            $table->string('aturan_pakai');
            $table->integer('total_tersedia');
            $table->integer('kekurangan');
            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('resep_id')->references('id')->on('reseps')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detail_reseps');
    }
}
