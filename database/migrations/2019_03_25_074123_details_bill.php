<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailsBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DetailsBill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bill')->unsigned();
            $table->foreign('id_bill')->references('id')->on('Bill');
            $table->integer('id_products_attribute')->unsigned();
            $table->foreign('id_products_attribute')->references('id')->on('AttributeProduct');
            $table->integer('Number');
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
        Schema::dropIfExists('DetailsBill');
    }
}
