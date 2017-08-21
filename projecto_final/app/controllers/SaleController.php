<?php

class SaleController extends BaseController{

	public function getSales(){

		$user_id = Auth::user()->id;
		$store_id = Store::where('user_id','=',$user_id)->pluck('id');
		$products = DB::table('stores_has_products')->where('store_id','=',$store_id)->get();

		//dd($products);
		return View::make('sales.sales')->with('products',$products);

	}

	public function postSales(){

		$product_id = Input::get('product_id');
		$user_id = Auth::user()->id;
		$store_id = Store::where('user_id','=',$user_id)->pluck('id');
		$quantity = (int)(Input::get('quantity'));
		$min = Input::get('min');
		$max = Input::get('max');


		if($quantity>0){
			DB::table('stores_has_products')->where('store_id','=',$store_id)->where('product_id','=',$product_id)
				->update(array('quantity'=>($quantity-1)));

			if($quantity==$min){
				$store = DB::table('stores')->where('id','=',$store_id)->pluck('name');
				$product_type = DB::table('products')->where('id','=',$product_id)->pluck('type');

				$msg = "A loja ".$store. " atingiu o limite mínimo do produto ".$product_type;
				Notification::create(array(
					'description' => $msg,
					'active' => 1
				));

				if(count(Order::where('store_id','=',$store_id)->where('product_id','=',$product_id)->first())){
					$order = Order::where('store_id','=',$store_id)->where('product_id','=',$product_id)->first();
					$order->quantity = ($max - $min - 1);
					$order->save();
				}else{
					Order::create(array(
						'store_id' => $store_id,
						'factory_id' => rand(1,10),
						'product_id' => $product_id,
						'quantity' => $max
					));
				}

				$msg = "Atingiu o limite mínimo do produto";
				return Redirect::route('register-sales')->with('msg',$msg);
			}else{

				return Redirect::route('register-sales');
			}
		}
		else{
			$message = 'Stock Esgotado!';
			return Redirect::route('register-sales');
		}
	}

}