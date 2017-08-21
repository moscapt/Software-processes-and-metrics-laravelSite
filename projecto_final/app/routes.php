<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
/	Home route
*/
Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@showWelcome'
	));

/*
/	Unauthenticated Group
*/
Route::group(array('before'=>'guest'),function(){

		/*
		/CSRF protection
		*/
		Route::group(array('before'=>'csrf'),function(){

				/*
				/	Login(POST)
				*/
				Route::post('/conta/entrar',array(
					'as' => 'login-page-post',
					'uses' => 'AccountController@postLogin'
				));

		});
		
		/*
		/	Login(GET)
		*/
		Route::get('/conta/entrar',array(
			'as' => 'login-page',
			'uses' => 'AccountController@getLogin'
		));

});


/*
/	Authenticated Group
*/
Route::group(array('before'=>'auth'),function(){

		/*
		/	CSRF Protection
		*/
		Route::group(array('before'=>'csrf'),function(){

			
				/*
				/	Registar(POST)
				*/
				Route::post('/conta/registar',array(
						'as' => 'register-page-post',
						'uses' => 'AccountController@postRegister'
				));


		});

		/*
		/	Notificações (GET)
		*/
		Route::get('/notificacoes',array(
				'as' => 'notif-page',
				'uses' => 'NotificationController@getNot'
		));

		/*
		/	Lojas (GET)
		*/
		Route::get('/lojas',array(
				'as' => 'stores-page',
				'uses' => 'StoreController@getStores'
		));
		
		/*
		/	Role Admin Protection
		*/
		Route::group(array('before'=>'admin'),function(){

			/*
			*	Editar Produtos (GET)
			*/
			Route::get('/produto/editar/{id}',function($id){

				$prod = Product::find($id);

				return View::make('factory.edit')->with('prod',$prod);

			});

			/*
			/	Register(GET)
			*/
			Route::get('/conta/registar',array(
					'as' => 'register-page',
					'uses' => 'AccountController@getRegister'
				));
			/*
			/	Loja(GET)
			*/
			Route::get('/loja/{id}', function($id){
				
				$loja = Store::find($id);

				return View::make('store.store')->with('loja',$loja);

			})->where('id','[0-9]+');

			/*
			/	Notificações (GET)
			*/
			Route::get('/notificacoes',array(
					'as' => 'notif-page',
					'uses' => 'NotificationController@getNot'
			));

			/*
			/	Apaga notificações (GET)
			*/
			Route::get('/notificacoes/{id}',array(
					'as' => 'notif-page-post',
					'uses' => 'NotificationController@updateNot'
			));

			/*
			/	Registar produtos (GET)
			*/
			Route::get('/fabrica/adicionar',array(
					'as' => 'factory-add',
					'uses' => 'FactoryController@getAdd'
			));

			/*
			/	CSRF Protection
			*/
			Route::group(array('before'=>'csrf'),function(){

				/*
				*	Editar Produto(POST)
				*/
				Route::post('/produto/editar',array(
					'as' => 'product-edit-post',
					'uses' => 'FactoryController@postEdit'
				));

				/*
				/	Lojas (POST)
				*/
				Route::post('/lojas',array(
						'as' => 'stores-page-post',
						'uses' => 'StoreController@postStores'
				));

				/*
				/	Adicionar produto (POST)
				*/
				Route::post('/fabrica/adicionar',array(
						'as' => 'factory-add-post',
						'uses' => 'FactoryController@postAdd'
				));


			});
		});

		/*
		/	Role super protection
		*/
		Route::group(array('before'=>'super'),function(){
			Route::group(array('before'=>'csrf'),function(){



			});
			/*
			*	Expedir encomendas(GET)
			*/
			Route::get('/encomenda/expedir/{id}',array(
					'as' => 'order-dispatch',
					'uses' => 'OrderController@getDispatched'
			));

			/*
			/	Apaga notificações (GET)
			*/
			Route::get('/notificacoes/{id}',array(
					'as' => 'notif-page-post',
					'uses' => 'NotificationController@updateNot'
			));

			/*
			/	Encomendas
			*/
			Route::get('/encomendas/',array(
					'as' => 'orders-page',
					'uses' => 'OrderController@getOrdersDispatch'
			));

		});

		/*
		/	Role user protection
		*/
		Route::group(array('before'=>'user'),function(){

			Route::group(array('before'=>'csrf'),function(){

				/*
				/	Encomendar (POST)
				*/
				Route::post('/encomenda/produto',array(
						'as' => 'order-product-post',
						'uses' => 'OrderController@postOrder'
				));

				/*
				/	Adicionar Loja (POST)
				*/
				Route::post('/lojas',array(
						'as' => 'stores-page-add',
						'uses' => 'StoreController@addStore'
				));

				/*
				*	Alterar mínimo e máximo dos produtos
				*/
				Route::post('/stock/minmax',array(
						'as' => 'stock-min-max-post',
						'uses' => 'ProductController@postSave'
				));

				/*
				*	Registar venda
				*/
				Route::post('/registar/vendas',array(
						'as' => 'register-sales-post',
						'uses' => 'SaleController@postSales'
				));
			});

			/*
			*	Mostrar Loja
			*/
			Route::get('/loja',array(
					'as' => 'show-store',
					'uses' => 'StoreController@getStore'
			));

			/*
			*	Listar vendas
			*/
			Route::get('/registar/vendas',array(
					'as' => 'register-sales',
					'uses' => 'SaleController@getSales'
			));

			/*
			/	Listar Produtos
			*/
			Route::get('/stock/produtos',array(
					'as' => 'list-products',
					'uses' => 'ProductController@getProducts'
			));

			/*
			/	Encomendar(GET)
			*/
			Route::get('/encomenda/produto',array(
					'as' => 'order-product',
					'uses' => 'OrderController@getOrders'
			));


		});

		/*
		/	Logout(GET)
		*/
		Route::get('/conta/sair',array(
			'as' => 'logout-page',
			'uses' => 'AccountController@getLogout'
		));

});