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


	Route::get('koszyk_goscia', ['uses' => 'ProductController@getBasket']);
	Route::get('koszyk_goscia',[
			'uses' => 'ProductController@getBasket',
			'as' => 'product.index'
	]);
	
	Route::get('koszyk_goscia/delete/{id}', ['uses' => 'ProductController@delete']);
	Route::post('/koszyk_goscia/{id}', 'ProductController@getAddToBasket');
	Route::post('/transakcja_gosc/create', 'LogOnDataController@create');
	Route::post('/transakcja_gosc', 'ProductController@getSummary');
	
	Route::get('pokaz_produkt/{id}', 'ShowProductController@index');
	Route::resource('strona_domowa','HomePageController');

	Route::post('koszyk/destroy/{id}', ['uses' => 'BasketController@destroy']);
	Route::post('koszyk/changeAmount/{id}', 'BasketController@changeAmount');
	Route::post('koszyk/store', ['uses' => 'BasketController@store']);
	Route::get('koszyk', ['uses' => 'BasketController@index']);
	
	Route::post('kupione/create/', ['uses' => 'BuyingController@create']);
	Route::post('transakcja', ['uses' => 'DealController@index']);
	Route::get('transakcja', ['uses' => 'DealController@index']);
	Route::get('kupione', ['uses' => 'BuyingController@index']);
	Route::post('kupione/store','BuyingController@store');
	
	Route::post('/dane/update/{id}', 'DataCustomerController@update');
	Route::post('/dane/edit/{id}', 'DataCustomerController@edit');
	Route::get('/dane', 'DataCustomerController@index');
	
	
	Route::post('dodaj_adres_dostawy/destroy/{id}', ['uses' => 'Adress_deliveryController@destroy']);
	Route::post('dodaj_adres_dostawy/store', ['uses' => 'Adress_deliveryController@store']);
	Route::get('dodaj_adres_dostawy', ['uses' => 'Adress_deliveryController@index']);

Route::group([
		'middleware' => 'roles',
		'roles' => ['Admin']
], function() {
	Route::get('/admin/show_one_customers/{id}', 'AdminFunctions\CustomerAdminController@showOneCustomers');
	Route::post('/admin/edit_customers/update/{id}', 'AdminFunctions\CustomerAdminController@update');
	Route::get('/admin/edit_customers/{id}', 'AdminFunctions\CustomerAdminController@editCustomers');
	Route::get('/admin/delete_this_order/{id}', 'AdminFunctions\OrdersAdminController@deleteOrder');
	Route::get('/admin/orders_this_customers/{id}', 'AdminFunctions\OrdersAdminController@index');
	Route::get('/admin/delete_customers/{id}', 'AdminFunctions\CustomerAdminController@destroy');
	Route::get('/admin/new_customers', 'AdminFunctions\CustomerAdminController@viewNewUser');
	Route::get('/admin/this_order/{id}', 'AdminFunctions\OrdersAdminController@thisOrder');
	Route::get('/admin/customers', 'AdminFunctions\CustomerAdminController@index');
	Route::get('/admin/strona_domowa','AdminFunctions\AdminController@index');
	
	Route::post('/admin/edit_product/update/{id}', 'AdminFunctions\ProductsAdminController@update');
	Route::get('/admin/all_product/delete/{id}', 'AdminFunctions\ProductsAdminController@destroy');
	Route::post('/admin/add_product/store', 'AdminFunctions\ProductsAdminController@store');
	Route::get('/admin/current_orders', 'AdminFunctions\OrdersAdminController@allOrders');
	Route::get('/admin/add_product', 'AdminFunctions\ProductsAdminController@addProduct');
	Route::get('/admin/all_product', 'AdminFunctions\ProductsAdminController@index');
	Route::get('/admin/add_role', 'AdminFunctions\RolesAdminController@index');
	
	Route::get('/admin/delete_role/{id}', 'AdminFunctions\RolesAdminController@destroy');
	Route::post('/admin/edit_role/{id}', 'AdminFunctions\RolesAdminController@update');
	Route::post('/admin/add_role', 'AdminFunctions\RolesAdminController@addRole');
	
	Route::get('/admin/edit_products/delete_photo_gallery/{id}/{file}', 'AdminFunctions\PhotoController@deletePhotoGalleryDuringEdit');
	Route::post('/admin/edit_products/add_photo_gallery', 'AdminFunctions\PhotoController@editPhotoGalleryDuringEditProduct');
	Route::post('/admin/add_product_gallery/photo', 'AdminFunctions\PhotoController@addPhotoGalleryDuringAddProduct');
	Route::post('/admin/edit_products/add_photo', 'AdminFunctions\PhotoController@addPhotoDuringEditProduct');
	Route::get('/admin/delete_photo/{id}', 'AdminFunctions\PhotoController@deletePhotoDuringEdit');
	Route::get('/admin/edit_product/{id}', 'AdminFunctions\ProductsAdminController@edit');
	
	Route::get('admin/delete_kind/{id}', 'AdminFunctions\KindAdminController@deleteKinds');
	Route::post('admin/edit_kind/{id}', 'AdminFunctions\KindAdminController@editKinds');
	Route::post('admin/add_kind', 'AdminFunctions\KindAdminController@addKinds');
	Route::get('admin/kinds', 'AdminFunctions\KindAdminController@index');
	
	Route::get('/admin/chart_delivery', 'AdminFunctions\AdminController@deliveryChart');
	Route::get('/admin/chart_product', 'AdminFunctions\AdminController@productChart');
	Route::get('/admin/chart_paying', 'AdminFunctions\AdminController@paidChart');
	Route::get('/admin/chart_sold', 'AdminFunctions\AdminController@soldChart');
	
	/*Route::post('admin/addToDoList',[
			'uses' => 'AdminFunctions\ToDoListController@addToDoList',
			'as' => 'addToDoList',		
	]);*/
	
	Route::post('admin/addToDoList', function()
	{
		if(Request::ajax())
		{
			return 'data is exist';
		}
	})->name('addToDoList');
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
	
	$pdf=PDF::loadView('faktury',['buying'=>$buying], ['admin_data'=> $admin_data]);
	return $pdf->download('faktura_VAT_'.$id.'.pdf');
	
});


