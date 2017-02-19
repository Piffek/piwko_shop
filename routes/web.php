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




Route::get('/', 'HomePageController@index');

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
	
	
	

	
	Route::resource('strona_domowa','HomePageController');
	Route::get('pokaz_produkt/{id}', 'ShowProductController@index');
	Route::post('koszyk/store', ['uses' => 'BasketController@store']);

	Route::get('koszyk', ['uses' => 'BasketController@index']);
	Route::post('koszyk/destroy/{id}', ['uses' => 'BasketController@destroy']);
	Route::post('koszyk/changeAmount/{id}', 'BasketController@changeAmount');
	
	Route::get('transakcja', ['uses' => 'DealController@index']);
	Route::post('transakcja', ['uses' => 'DealController@index']);
	
	Route::post('kupione/store','BuyingController@store');
	
	/*Route::resource('kupione/store', 'BuyingController',
			['only' => ['store', 'getBuy']]);*/
	
	
	Route::post('kupione/create/', ['uses' => 'BuyingController@create']);
	Route::get('kupione', ['uses' => 'BuyingController@index']);
	
	Route::get('/dane', 'DataCustomerController@index');
	Route::post('/dane/update/{id}', 'DataCustomerController@update');
	Route::post('/dane/edit/{id}', 'DataCustomerController@edit');
	
	
	Route::get('dodaj_adres_dostawy', ['uses' => 'Adress_deliveryController@index']);
	Route::post('dodaj_adres_dostawy/destroy/{id}', ['uses' => 'Adress_deliveryController@destroy']);
	Route::post('dodaj_adres_dostawy/store', ['uses' => 'Adress_deliveryController@store']);


Route::group([
		'middleware' => 'roles',
		'roles' => ['Admin']
], function() {
	Route::get('/admin/this_order/{id}', 'Admin\OrdersAdminController@thisOrder');
	Route::get('/admin/delete_this_order/{id}', 'Admin\OrdersAdminController@deleteOrder');
	Route::get('/admin/strona_domowa','Admin\AdminController@index');
	Route::get('/admin/customers', 'Admin\CustomerAdminController@index');
	Route::get('/admin/new_customers', 'Admin\CustomerAdminController@viewNewUser');
	Route::get('/admin/orders_this_customers/{id}', 'Admin\OrdersAdminController@index');
	Route::get('/admin/edit_customers/{id}', 'Admin\CustomerAdminController@editCustomers');
	Route::get('/admin/show_one_customers/{id}', 'Admin\CustomerAdminController@showOneCustomers');
	Route::post('/admin/edit_customers/update/{id}', 'Admin\CustomerAdminController@update');
	Route::get('/admin/delete_customers/{id}', 'Admin\CustomerAdminController@destroy');
	Route::get('/admin/add_product', 'Admin\ProductsAdminController@addProduct');
	Route::get('/admin/all_product', 'Admin\ProductsAdminController@index');
	Route::post('/admin/add_product/store', 'Admin\ProductsAdminController@store');
	Route::post('/admin/edit_product/update/{id}', 'Admin\ProductsAdminController@update');
	Route::get('/admin/all_product/delete/{id}', 'Admin\ProductsAdminController@destroy');
	Route::get('/admin/current_orders', 'Admin\OrdersAdminController@allOrders');
	Route::get('/admin/add_role', 'Admin\RolesAdminController@index');
	
	Route::post('/admin/add_role', 'Admin\RolesAdminController@addRole');
	Route::post('/admin/edit_role/{id}', 'Admin\RolesAdminController@update');
	Route::get('/admin/delete_role/{id}', 'Admin\RolesAdminController@destroy');
	
	Route::post('/admin/add_product_gallery/photo', 'Admin\PhotoController@addPhotoGalleryDuringAddProduct');
	Route::get('/admin/edit_product/{id}', 'Admin\ProductsAdminController@edit');
	Route::get('/admin/chart_product', 'Admin\AdminController@productChart');
	Route::get('/admin/chart_sold', 'Admin\AdminController@soldChart');
	Route::get('/admin/chart_delivery', 'Admin\AdminController@deliveryChart');
	Route::get('/admin/chart_paying', 'Admin\AdminController@paidChart');
	Route::get('/admin/delete_photo/{id}', 'Admin\PhotoController@deletePhotoDuringEdit');
	Route::post('/admin/edit_products/add_photo', 'Admin\PhotoController@addPhotoDuringEditProduct');
	Route::post('/admin/edit_products/add_photo_gallery', 'Admin\PhotoController@editPhotoGalleryDuringEditProduct');
	Route::get('/admin/edit_products/delete_photo_gallery/{id}/{file}', 'Admin\PhotoController@deletePhotoGalleryDuringEdit');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');

Route::get('/pdf/{id}', function ($id) {

	
	$buying = App\Buyings::where([
			['id','=',$id],
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


