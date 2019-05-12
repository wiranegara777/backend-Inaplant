<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Task2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task2s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemilik_lahan');
            $table->string('title');
            $table->string('description');
            $table->string('startdate');
            $table->string('enddate');
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
        Schema::dropIfExists('task2s');
    }
}
