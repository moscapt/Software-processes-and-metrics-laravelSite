<?php

class AccountController extends BaseController{


	public function getRegister(){

		return View::make('account.register');

	}

	public function postRegister(){

		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email|max:50|unique:users',
				'username' => 'required|max:20|min:3|unique:users',
				'password' => 'required|min:6',
				'password_again' => 'required|same:password',
				'role' => 'required'
				));

		if($validator->fails()){
			return Redirect::route('register-page')->withErrors($validator);
		}
		else{
			//Create Account

			$email = Input::get('email');
			$username = Input::get('username');
			$password = Input::get('password');
			$role = Input::get('role');

			$user = User::create(array(
					'email' => $email,
					'username' => $username,
					'password' => Hash::make($password),
					'role' => $role
				));

			if($user){

				return Redirect::route('home')->with('global','Your account has been created! We have sent you an email to active.');
			}
		}

	}

	public function getLogin(){

		return View::make('account.login');

	}

	public function postLogin(){

		$validator = Validator::make(Input::all(),array(

			'username' => 'required|min:3',
			'password' => 'required'

			)
		);

		if($validator->fails()){
			return Redirect::route('login-page')->withErrors($validator);
		}
		else{

			$auth = Auth::attempt(array(
					'username' => Input::get('username'),
					'password' => Input::get('password')
				)
			);

			if($auth){
				//Redirect to intended page.
				return Redirect::route('home')->with('global','Bem Vindo!');
			}
			else{
				$message = 'Utilizador/Palavra-chave incorreto';
				return Redirect::route('login-page')->with('msg',$message);
				//return Redirect::route('login-page');
			}
		}
		
		return Redirect::route('login-page');

	}

	public function getLogout(){
		Auth::logout();
		return Redirect::route('home');
	}
}