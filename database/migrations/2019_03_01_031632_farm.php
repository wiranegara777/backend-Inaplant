<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Farm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jumlah_pohon');
            $table->string('varietas');
            $table->string('siklus_pertumbuhan');
            $table->dateTime('panen_pertama');
            $table->dateTime('panen_terakhir');
            $table->integer('jumlah_produksi_pertahun');
            $table->string('latitude_longtitude_1');
            $table->string('latitude_longtitude_2');
            $table->string('latitude_longtitude_3');
            $table->string('latitude_longtitude_4');
            $table->integer('id_farm_manager');
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
        Schema::dropIfExists('farms');
    }
}
