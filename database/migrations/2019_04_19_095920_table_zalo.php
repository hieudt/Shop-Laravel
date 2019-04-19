<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableZalo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('app_id');
            $table->string('app_secrect');
            $table->string('app_code');
            $table->string('app_token');
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
        Schema::dropIfExists('provider_config');
    }
}
