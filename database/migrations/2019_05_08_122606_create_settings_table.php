<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('theme_color');
			$table->text('nameshop', 65535)->nullable();
			$table->text('addressshop', 65535)->nullable();
			$table->text('phoneshop', 65535)->nullable();
			$table->text('fblink', 65535)->nullable();
			$table->text('twitterlink', 65535)->nullable();
			$table->text('instagramlink', 65535)->nullable();
			$table->text('youtubelink', 65535)->nullable();
			$table->text('emailadmin', 65535);
			$table->text('authtokenbackend', 65535)->nullable();
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
		Schema::drop('settings');
	}

}
