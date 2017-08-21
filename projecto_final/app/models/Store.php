<?php

class Store extends Eloquent{

	/*
	/	Database table used by the model
	*/
	protected $table = 'stores';

	/*
	/	Fillable property
	*/
	protected $fillable = array('name','address','user_id');

	
	public function products(){
		return $this->hasMany('Product');
	}

	public function users(){
		return $this->hasOne('User');
	}
	
}