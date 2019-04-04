<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sub')->unsigned();
            $table->foreign('id_sub')->references('id')->on('SubCategory');
            $table->integer('id_chatlieu')->unsigned();
            $table->foreign('id_chatlieu')->references('id')->on('ChatLieu');
            $table->string('slug');
            $table->string('title');
            $table->string('description');
            $table->integer('discount');
            $table->integer('cost');
            $table->text('thumbnail');
            $table->integer('featured')->default(0);
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
        Schema::dropIfExists('Product');
    }
}
