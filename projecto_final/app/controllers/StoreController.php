<?php

class StoreController extends BaseController{



	public function getStores(){

		$stores = Store::all();

		return View::make('store.stores')->with('stores',$stores);

	}

	public function postStores(){

		$store = Store::where('name','=',Input::get('store_name'))->first();
		return View::make('store.store')->with('loja',$store);

	}

	public function addStore(){

		$name = Input::get('name');
		$address = Input::get('address');
		$user_id = Auth::user()->id;

		$store = Store::create(array(
			'name' => $name,
			'address' => $address,
			'user_id' => $user_id
		));

		if($store){
			
			$stores = Store::all();

			return View::make('store.stores')->with('stores',$stores);

		}
		else{
			return Redirect::route('home');
		}
	}

	public function getStore(){

		$user_id = Auth::user()->id;
		$loja = Store::where('user_id','=',$user_id)->first();

		return View::make('store.store')->with('loja',$loja);

	}
}