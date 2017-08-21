<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresHasProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stores_has_products',function($table){
			$table->integer('store_id')->unsigned();
			$table->foreign('store_id')->references('id')->on('stores');
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products');

			$table->integer('quantity');
			$table->integer('min');
			$table->integer('max');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stores_has_products');
	}

}
