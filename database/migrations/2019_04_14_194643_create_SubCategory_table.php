<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('SubCategory', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_category')->unsigned()->index('subcategory_id_category_foreign');
			$table->string('name_sub');
			$table->string('slug')->nullable();
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
		Schema::drop('SubCategory');
	}

}
