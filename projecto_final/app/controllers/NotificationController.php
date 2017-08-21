<?php

class NotificationController extends BaseController{

	public function getNot(){

		$notifications = Notification::all();
		return View::make('notifications')->with('notifications',$notifications);

	}

	public function updateNot($id){

		$update = Notification::where('id','=',$id)->update(array('active'=>0));

		$notifications = Notification::all();
		return View::make('notifications')->with('notifications',$notifications);

	}

}