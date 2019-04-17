<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code');
			$table->integer('Percent');
			$table->integer('RequireTotal');
			$table->dateTime('Date');
			$table->text('title', 65535);
			$table->text('thumbnail', 65535);
			$table->integer('typeEnable')->comment('0 : công khai , 1 : User , 2 : User Tiềm năng');
			$table->text('content', 65535);
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
		Schema::drop('coupons');
	}

}
