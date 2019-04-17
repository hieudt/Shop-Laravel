<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailsBillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('DetailsBill', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_bill')->unsigned()->index('detailsbill_id_bill_foreign');
			$table->integer('id_products_details')->unsigned()->index('FK_DetailsProductAtt');
			$table->integer('Number');
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
		Schema::drop('DetailsBill');
	}

}
