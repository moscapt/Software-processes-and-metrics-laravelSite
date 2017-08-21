<?php

class Notification extends Eloquent{


	protected $table = 'notifications';

	protected $fillable = array('description','active');

	public static function getNotifications(){

		return count(DB::table('notifications')->where('active','=',1)->get());

	}

	

}