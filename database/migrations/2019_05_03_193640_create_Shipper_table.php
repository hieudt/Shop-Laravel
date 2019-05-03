<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShipperTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Shipper', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('fee');
			$table->string('Time');
			$table->text('image', 65535);
			$table->boolean('Display')->nullable()->default(1);
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
		Schema::drop('Shipper');
	}

}
