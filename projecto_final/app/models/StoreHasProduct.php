<?php

class StoreHasProduct extends Eloquent{

	protected $table = 'stores_has_products';

	protected $fillable = array('store_id','product_id','quantity','min','max');

	

}