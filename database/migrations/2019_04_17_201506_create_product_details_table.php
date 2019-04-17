<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_product')->unsigned()->index('product_details_id_product_foreign');
			$table->integer('id_color')->unsigned()->index('product_details_id_color_foreign');
			$table->integer('id_size')->unsigned()->index('product_details_id_size_foreign');
			$table->text('sku', 65535);
			$table->integer('soluong');
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
		Schema::drop('product_details');
	}

}
