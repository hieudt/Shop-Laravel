<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_sub')->unsigned()->index('product_id_sub_foreign');
			$table->integer('id_chatlieu')->unsigned()->index('product_id_chatlieu_foreign');
			$table->string('slug');
			$table->string('title');
			$table->text('description', 65535);
			$table->integer('discount');
			$table->integer('cost');
			$table->timestamps();
			$table->text('thumbnail', 65535)->nullable();
			$table->integer('featured')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Product');
	}

}
