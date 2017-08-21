<?php

class FactoryController extends BaseController{

	public function getAdd(){

		$products = Product::all();
		return View::make('factory.add')->with('products',$products);

	}

	public function postAdd(){

		$validator = Validator::make(Input::all(),
			array('product_type' => 'required|max:50'

		));

		if($validator->fails()){
			return Redirect::route('factory-add')->withErrors($validator);
		}
		else{
			//Create Product

			$type = Input::get('product_type');

			$product = Product::create(array('type'=>$type));

			if($product){

				$products = Product::all();
				return Redirect::route('factory-add')->with('products',$products);
			}
		}

	}

	public function postEdit(){

		$new_type = Input::get('new_type');
		$id = Input::get('id');

		$prod = DB::table('products')->where('id','=',$id)->update(array(
				'type' => $new_type
			));

		$products = Product::all();
		return View::make('factory.add')->with('products',$products);
	}

}