<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SubCategory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('categories');
			$table->string('name_sub');
			$table->string('slug')->nullable();
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
        Schema::dropIfExists('SubCategory');
    }
}
