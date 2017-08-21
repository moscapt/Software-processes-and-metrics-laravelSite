<?php

class Product extends Eloquent{

	protected $table = 'products';

	protected $fillable = array('type');

	public function stores(){

		return $this->belongsToMany('Store');

	}

}