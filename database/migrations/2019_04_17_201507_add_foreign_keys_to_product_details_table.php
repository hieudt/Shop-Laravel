<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_details', function(Blueprint $table)
		{
			$table->foreign('id_color')->references('id')->on('Color')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_product')->references('id')->on('Product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_size')->references('id')->on('Size')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_details', function(Blueprint $table)
		{
			$table->dropForeign('product_details_id_color_foreign');
			$table->dropForeign('product_details_id_product_foreign');
			$table->dropForeign('product_details_id_size_foreign');
		});
	}

}
