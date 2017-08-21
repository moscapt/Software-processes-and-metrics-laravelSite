<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactoriesHasProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factories_has_products',function($table){
			$table->integer('factory_id')->unsigned();
			$table->foreign('factory_id')->references('id')->on('factories');
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products');

			$table->integer('quantity');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('factories_has_products');
	}

}
