<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDetailsBillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('DetailsBill', function(Blueprint $table)
		{
			$table->foreign('id_products_details', 'FK_DetailsProductAtt')->references('id')->on('product_details')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_bill')->references('id')->on('Bill')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('DetailsBill', function(Blueprint $table)
		{
			$table->dropForeign('FK_DetailsProductAtt');
			$table->dropForeign('detailsbill_id_bill_foreign');
		});
	}

}
