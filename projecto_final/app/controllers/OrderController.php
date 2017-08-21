<?php

class OrderController extends BaseController{


	public function getOrders(){

		$products = Product::all();
		return View::make('orders.order')->with('products',$products);

	}

	public function postOrder(){

		$user_id = Auth::user()->id;
		$store_id = DB::table('stores')->where('user_id',$user_id)->pluck('id');
		$product_id = Input::get('product_id');
		$quantity = Input::get('quantity');
		//$min = Input::get('min');
		//$max = Input::get('max');
		$product_type = Input::get('product_type');
		
		$order = DB::table('orders')->insert(
				array(
					'store_id' => $store_id,
					'factory_id' => rand(1,10),
					'product_id' => $product_id,
					'quantity' => $quantity,
					)
			);

			$store = DB::table('stores')->where('id',$store_id)->pluck('name');
			$msg = "A loja ".$store. " encomendou ".$quantity." sapatos do tipo ".$product_type;

			Notification::create(array(
				'description' => $msg,
				'active' => 1
			));
			
			return Redirect::route('order-product');

		//}
	}

	public function getOrdersDispatch(){

		$orders = Order::all();
		return View::make('orders.orders')->with('orders',$orders);

	}

	public function getDispatched($id){

		$order = Order::find($id);
		$store_id = $order->store_id;
		$product_id = $order->product_id;
		$quantity = $order->quantity;

		if(count(DB::table('stores_has_products')->where('store_id','=',$store_id)->where('product_id','=',$product_id)->get())){
			DB::table('stores_has_products')->where('store_id','=',$store_id)->where('product_id','=',$product_id)
				->update(array(
					'quantity' => $quantity,
			));
		}else{

		$storehasproduct = DB::table('stores_has_products')->insert(
					array(
						'store_id' => $store_id,
						'product_id' => $product_id,
						'quantity' => $quantity,
						)
			);

		}

			$order->delete();
			return Redirect::route('orders-page');

	}

}