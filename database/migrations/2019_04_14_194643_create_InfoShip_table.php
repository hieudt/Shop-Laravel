<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInfoShipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('InfoShip', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('FullName');
			$table->string('Address');
			$table->string('Phone')->nullable();
			$table->string('Email');
			$table->text('Note', 65535)->nullable();
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
		Schema::drop('InfoShip');
	}

}
