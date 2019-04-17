<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Product', function(Blueprint $table)
		{
			$table->foreign('id_chatlieu')->references('id')->on('ChatLieu')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_sub')->references('id')->on('SubCategory')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Product', function(Blueprint $table)
		{
			$table->dropForeign('product_id_chatlieu_foreign');
			$table->dropForeign('product_id_sub_foreign');
		});
	}

}
