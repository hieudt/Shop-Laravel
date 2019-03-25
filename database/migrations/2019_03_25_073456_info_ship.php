<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InfoShip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('InfoShip', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FullName');
            $table->string('Address');
            $table->string('Phone');
            $table->string('Email');
            $table->integer('id_quan')->unsigned();
            $table->foreign('id_quan')->references('id')->on('quan');
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
        Schema::dropIfExists('InfoShip');
    }
}
