<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders',function($table){
			$table->increments('id');

			$table->integer('store_id')->unsigned();
			$table->foreign('store_id')->references('id')->on('stores');
			$table->integer('factory_id')->unsigned();
			$table->foreign('factory_id')->references('id')->on('factories');
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products');

			$table->integer('quantity');

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
		Schema::drop('orders');
	}

}
