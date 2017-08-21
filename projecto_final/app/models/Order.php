<?php

class Order extends Eloquent{


	protected $table = 'orders';

	protected $fillable = array('store_id','factory_id','product_id','quantity');
	

}