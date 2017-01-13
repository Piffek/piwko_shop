<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


//@Admin page




Route::get('/', 'Strona_domowaController@index');

/*Route::get('/', function () {
	return 'Laravel5';
});*/

	Route::get('koszyk_goscia', ['uses' => 'ProductController@getBasket']);
	Route::get('koszyk_goscia',[
			'uses' => 'ProductController@getBasket',
			'as' => 'product.index'
	]);
	Route::post('/transakcja_gosc/create', 'LogOnDataController@create');
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	Route::post('/koszyk_goscia/{id}', 'ProductController@getAddToBasket');
	Route::post('/transakcja_gosc', 'ProductController@getSummary');
	Route::get('koszyk_goscia/delete/{id}', ['uses' => 'ProductController@delete']);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	Route::resource('strona_domowa','Strona_domowaController');
	Route::get('pokaz_produkt/{id}', 'Pokaz_produktController@index');
	Route::post('koszyk/store', ['uses' => 'KoszykController@store']);

	Route::get('koszyk', ['uses' => 'KoszykController@index']);
	Route::post('koszyk/destroy/{id}', ['uses' => 'KoszykController@destroy']);
	
	Route::get('transakcja', ['uses' => 'DealController@index']);
	Route::post('transakcja', ['uses' => 'DealController@index']);
	
	Route::post('kupione/store', ['uses' => 'BuyingController@store']);
	Route::post('kupione/create/', ['uses' => 'BuyingController@create']);
	Route::get('kupione', ['uses' => 'BuyingController@index']);
	
	Route::get('/dane', 'DaneController@index');
	Route::post('/dane/update/{id}', 'DaneController@update');
	Route::post('/dane/edit/{id}', 'DaneController@edit');
	
	
	Route::get('dodaj_adres_dostawy', ['uses' => 'Adress_deliveryController@index']);
	Route::post('dodaj_adres_dostawy/destroy/{id}', ['uses' => 'Adress_deliveryController@destroy']);
	Route::post('dodaj_adres_dostawy/store', ['uses' => 'Adress_deliveryController@store']);


Route::group([
		'middleware' => 'roles',
		'roles' => ['Admin']
], function() {
	
	Route::get('/admin/strona_domowa','Admin\AdminController@index');
	Route::get('/admin/customers', 'Admin\CustomerAdminController@index');
	Route::get('/admin/new_customers', 'Admin\CustomerAdminController@ViewNewUser');
	
	
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');

Route::get('/pdf/{id}', function ($id) {
	/*$buying = DB::table('items')
	->join('buyings', 'items.id', '=', 'buyings.id_produktu')
	->select('items.produkt','buyings.ilosc','buyings.cena','buyings.id','buyings.id_user','buyings.created_at')
	->where([
			['buyings.id','=',$id],
			['id_user','=',Auth::user()->id]
	])->get();*/
	
	$buying = DB::table('buyings')
	->join('items', 'buyings.id_produktu', '=', 'items.id')
	->select('items.produkt','buyings.*')
	->where([
			['buyings.id','=',$id],
			['id_user','=',Auth::user()->id]
	])->get();
	
	$admin_data =  DB::table('roles_has_users')
	->join('users', 'roles_has_users.users_id', '=', 'users.id')
	->select('users.*')
	->where([
			['roles_id','=','4'],
	])->get();
	//return $id;

	//$buying= App\Buyings::whereid($id)->get();
	//$users = App\User::whereid(Auth::user()->id)->get();
	
	$pdf=PDF::loadView('faktury',['buying'=>$buying], ['admin_data'=> $admin_data]);
	return $pdf->download('faktura_VAT_'.$id.'.pdf');
	
});


