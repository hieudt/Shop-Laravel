<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Color', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('slug', 65535);
			$table->string('codeColor', 100)->nullable()->default('#ffffff');
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
		Schema::drop('Color');
	}

}
