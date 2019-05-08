<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Bill', function(Blueprint $table)
		{
			$table->foreign('id_shipper', 'FK_BillShiper')->references('id')->on('Shipper')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_coupon')->references('id')->on('coupons')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_infoship')->references('id')->on('InfoShip')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_user')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Bill', function(Blueprint $table)
		{
			$table->dropForeign('FK_BillShiper');
			$table->dropForeign('bill_id_coupon_foreign');
			$table->dropForeign('bill_id_infoship_foreign');
			$table->dropForeign('bill_id_user_foreign');
		});
	}

}
