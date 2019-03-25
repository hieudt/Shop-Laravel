<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('Status');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_coupon')->unsigned();
            $table->foreign('id_coupon')->references('id')->on('coupons');
            $table->integer('id_infoship')->unsigned();
            $table->foreign('id_infoship')->references('id')->on('InfoShip');
            $table->integer('TotalMoney');
            
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
        Schema::dropIfExists('Bill');
    }
}
