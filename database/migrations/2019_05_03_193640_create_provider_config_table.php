<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProviderConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('provider_config', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('app_id')->nullable();
			$table->string('app_secrect')->nullable();
			$table->text('app_code', 65535)->nullable();
			$table->text('app_token', 65535)->nullable();
			$table->text('pages_id', 65535)->nullable();
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
		Schema::drop('provider_config');
	}

}
