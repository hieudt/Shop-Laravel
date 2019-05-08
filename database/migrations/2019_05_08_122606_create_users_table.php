<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->nullable()->unique();
			$table->text('Address', 65535)->nullable();
			$table->text('Phone', 65535)->nullable();
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->text('provider', 65535)->nullable();
			$table->text('provider_id', 65535)->nullable();
			$table->integer('role')->default(0);
			$table->text('settings', 65535)->nullable();
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
		Schema::drop('users');
	}

}
