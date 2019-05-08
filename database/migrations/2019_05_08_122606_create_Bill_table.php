<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Bill', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('status')->unsigned()->index('bill_id_status_foreign')->comment('0 : Chờ Xử Lý 1 : Chờ Nhận Hàng 2 : Đã Giao Hàng 3 : Hủy Đơn Hàng');
			$table->integer('statusPay')->comment('0 : Chưa thanh toán 1 : Đã thanh toán');
			$table->integer('PayMethod')->comment('0 : COD , 1 : Chuyển khoản ngân hàng 2 : Ví điện tử 3 : Thẻ tín dụng');
			$table->integer('id_user')->unsigned()->index('bill_id_user_foreign');
			$table->integer('id_coupon')->unsigned()->nullable()->index('bill_id_coupon_foreign');
			$table->integer('id_infoship')->unsigned()->nullable()->index('bill_id_infoship_foreign');
			$table->integer('id_shipper')->unsigned()->index('FK_BillShiper');
			$table->integer('TotalMoney')->nullable();
			$table->integer('feeship')->nullable()->default(0);
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
		Schema::drop('Bill');
	}

}
