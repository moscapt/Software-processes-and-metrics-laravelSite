<?php

class ProductController extends BaseController{

	public function getProducts(){

		$user_id = Auth::user()->id;
		$store_id = DB::table('stores')->where('user_id','=',$user_id)->pluck('id');
		$products_id = DB::select(
						DB::raw("SELECT product_id,quantity,min,max FROM stores_has_products WHERE store_id = '$store_id' ORDER BY product_id ASC"));

		return View::make('products.products')->with('products_id',$products_id);

	}

	public function postSave(){

		$validator = Validator::make(Input::all(),array(
				'product_id' => 'required',
				'min' => 'required',
				'max' => 'required'
		));

		if($validator->fails()){
			return Redirect::to('/stock/produtos')->withErrors($validator);
		}
		else{

			$product_id = Input::get('product_id');
			$min = Input::get('min');
			$max = Input::get('max');

			$user_id = Auth::user()->id;
			$store_id = DB::table('stores')->where('user_id','=',$user_id)->pluck('id');

			
			$update = DB::table('stores_has_products')->where('product_id','=',$product_id)
				->where('store_id','=',$store_id)->update(array('min'=>$min,'max'=>$max));
		}

		if($update){
			
			$notification = new Notification;
			$notification->description = "A loja ".(Store::find($store_id)->name)." alterou o máximo e mínimo do produto ".(Product::find($product_id)->pluck('type')).".";
			$notification->active = 1;
			$notification->save();

			return Redirect::to('/stock/produtos');
		}else{
			return Redirect::to('/stock/produtos');
		}

	}

}