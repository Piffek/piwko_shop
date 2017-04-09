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


	Route::get('/{photo}',[
			'as' => 'getPhoto.homePage',
			'uses'=>'AdminFunctions\PhotoController@getItemPhoto'
	]);

	Route::get('koszyk_goscia',[
			'as' => 'basketGuest',
			'uses'=> 'ProductController@getBasket'
	]);
	Route::get('koszyk_goscia/delete/{id}', [
			'as'=>'deleteBasketGuest','
			uses' => 'ProductController@delete'
	]);
	Route::post('/koszyk_goscia/{id}',[
			'as' => 'addToGuestBasket', 
			'uses'=> 'ProductController@getAddToBasket'
	]);
	Route::post('koszyk/store', [
			'as'=>'addToBasket',
			'uses' => 'BasketController@store'
	]);
	Route::post('/transakcja_gosc/create',[
			'as'=>'guestTransactionCreate', 
			'uses'=>'LogOnDataController@create'
	]);
	Route::get('/transakcja_gosc',[
			'as'=>'guestTransaction', 
			'uses'=>'ProductController@getSummary'
	]);
	
	
	Route::get('pokaz_produkt/{id}',[
			'as'=>'showProduct', 
			'uses'=>'ShowProductController@index'
	]);
	Route::resource('strona_domowa','HomePageController');

	Route::get('koszyk/destroy/{id}', [
			'as'=>'basketDestroy',
			'uses' => 'BasketController@destroy'
	]);
	Route::post('koszyk/changeAmount/{id}',[
			'as'=>'changeAmount',
			'uses'=>'BasketController@changeAmount'
	]);
	Route::get('koszyk', [
			'as'=>'basket',
			'uses' => 'BasketController@index'
	]);
	
	Route::post('kupione/create/', [
			'as'=>'buyingCreate',
			'uses' => 'BuyingController@create'
	]);
	Route::get('transakcja', [
			'as'=>'transaction',
			'uses' => 'DealController@index'
	]);
	Route::get('kupione', [
			'as'=>'buying',
			'uses' => 'BuyingController@index'
	]);
	Route::post('kupione/store','BuyingController@store');
	
	Route::post('/dane/update/{id}',[
			'as'=>'updateData',
			'uses'=>'DataCustomerController@update'
	]);
	Route::get('/dane/edit/{id}',[
			'as'=>'editData',
			'uses'=>'DataCustomerController@edit'
	]);
	Route::get('/dane',[
			'as'=>'data',
			'uses'=>'DataCustomerController@index'
	]);
	
	
	Route::get('dodaj_adres_dostawy/destroy/{id}', [
			'as'=>'deleteAdressDelivery',
			'uses' => 'Adress_deliveryController@destroy'
	]);
	Route::post('dodaj_adres_dostawy/store', [
			'as'=>'addAdressDelivery',
			'uses' => 'Adress_deliveryController@store'
	]);
	Route::get('dodaj_adres_dostawy', [
			'as'=>'showAdressDelivery',
			'uses' => 'Adress_deliveryController@index'
	]);
	
Route::group([
		'middleware' => 'roles',
		'roles' => ['Worker']
], function() {
	Route::get('/worker/show_worker_panel' ,'WorkerFunctions\WorkerController@showPanel');
	Route::post('/worker/changeState/{id}' ,[
			'as'=>'workerChangeState',
			'uses'=>'WorkerFunctions\WorkerController@changeState'
			
	]);
});

Route::group([
		'middleware' => 'roles',
		'roles' => ['Admin']
], function() {
	Route::get('/admin/show_one_customers/{id}', [
			'as'=>'adminShowOneCustomers',
			'uses'=>'AdminFunctions\CustomerAdminController@showOneCustomers'
	]);
	Route::post('/admin/edit_roles_customers/{id}', [
			'as'=>'adminEditRolesCustomers',
			'uses'=>'AdminFunctions\CustomerAdminController@changeRole'
	]);
	Route::post('/admin/edit_customers/update/{id}', [
			'as'=>'adminEditCustomers',
			'uses','AdminFunctions\CustomerAdminController@update'
	]);
	Route::get('/admin/edit_customers/{id}', [
			'as'=>'adminEditOneCustomer',
			'uses'=>'AdminFunctions\CustomerAdminController@editCustomers'
	]);
	Route::get('/admin/delete_this_order/{id}', [
			'as'=>'adminDeleteThisOrder',
			'uses'=>'AdminFunctions\OrdersAdminController@deleteOrder'
	]);
	Route::get('/admin/orders_this_customers/{id}', [
			'as'=>'ordersThisCustomers',
			'uses'=>'AdminFunctions\OrdersAdminController@index'
	]);
	Route::get('/admin/delete_customers/{id}', [
			'as'=>'adminDeleteOneCustomer' ,
			'uses'=>'AdminFunctions\CustomerAdminController@destroy'
	]);
	Route::get('/admin/new_customers', [
			'as'=>'newCustomers',
			'uses'=>'AdminFunctions\CustomerAdminController@viewNewUser'
	]);
	Route::get('/admin/this_order/{id}', [
			'as'=>'adminThisOrder',
			'uses'=>'AdminFunctions\OrdersAdminController@thisOrder'
	]);
	Route::get('/admin/customers', [
			'as'=>'adminCustomers',
			'uses'=>'AdminFunctions\CustomerAdminController@index'
	]);
	Route::get('/admin/strona_domowa',[
			'as'=>'adminStartPage',
			'uses'=>'AdminFunctions\AdminController@index'
	]);
	
	Route::post('/admin/edit_product/update/{id}', [
			'as'=>'adminEditProductUpdate',
			'uses'=>'AdminFunctions\ProductsAdminController@update'
	]);
	Route::get('/admin/product/delete/{id}', [
			'as'=>'adminDeleteProduct',
			'uses'=>'AdminFunctions\ProductsAdminController@destroy'
	]);
	Route::post('/admin/add_product/store', [
			'as'=>'adminAddProductStore',
			'uses'=>'AdminFunctions\ProductsAdminController@store'
	]);
	Route::get('/admin/current_orders', [
			'as'=>'adminCurrentOrders',
			'uses'=>'AdminFunctions\OrdersAdminController@allOrders'
	]);
	Route::get('/admin/add_product', [
			'as'=>'adminAddProduct',
			'uses'=>'AdminFunctions\ProductsAdminController@addProduct'
	]);
	Route::get('/admin/all_product', [
			'as'=>'adminAllProduct',
			'uses'=>'AdminFunctions\ProductsAdminController@index'
	]);
	Route::get('/admin/add_role', [
			'as'=>'addRole',
			'uses'=>'AdminFunctions\RolesAdminController@index'
	]);
	
	Route::get('/admin/delete_role/{id}',[
			'as'=>'adminDeleteRole',
			'uses'=>'AdminFunctions\RolesAdminController@destroy'
	]);
	Route::post('/admin/edit_role/{id}', [
			'as'=>'adminEditRole',
			'uses'=>'AdminFunctions\RolesAdminController@update'
	]);
	Route::post('/admin/add_role', [
			'as'=>'adminAddRole',
			'uses'=>'AdminFunctions\RolesAdminController@addRole'
	]);
	
	Route::get('/admin/edit_products/delete_photo_gallery/{id}/{file}', [
			'as'=>'deletePhotoGalleryDuringEdit',
			'uses'=>'AdminFunctions\PhotoController@deletePhotoGalleryDuringEdit'
	]);
	Route::post('/admin/edit_products/add_photo_gallery', [
			'as'=>'editPhotoGalleryDuringEdit',
			'uses' =>'AdminFunctions\PhotoController@editPhotoGalleryDuringEditProduct'
	]);
	Route::post('/admin/add_product_gallery/photo', [
			'as'=>'addPhotoGallery',
			'uses'=>'AdminFunctions\PhotoController@addPhotoGalleryDuringAddProduct'
	]);
	Route::post('/admin/edit_products/add_photo', [
			'as'=>'addPhotoDuringEdit',
			'uses'=>'AdminFunctions\PhotoController@addPhotoDuringEditProduct'
	]);
	Route::get('/admin/delete_photo/{id}', [
			'as'=>'adminDeletePhoto', 
			'uses'=>'AdminFunctions\PhotoController@deletePhotoDuringEdit'
	]);
	Route::get('/admin/edit_product/{id}', [
			'as'=>'adminEditProduct' , 
			'uses'=>'AdminFunctions\ProductsAdminController@edit'
	]);
	
	Route::get('admin/delete_kind/{id}', [
			'as'=>'adminDeleteKind',
			'uses'=>'AdminFunctions\KindAdminController@deleteKinds'
	]);
	Route::post('admin/edit_kind/{id}', [
			'as'=>'editKind',
			'uses'=>'AdminFunctions\KindAdminController@editKinds'
	]);
	Route::post('admin/add_kind', [
			'as'=>'addKind',
			'uses'=>'AdminFunctions\KindAdminController@addKinds'
	]);
	Route::get('admin/kinds', [
			'as'=>'kinds',
			'uses'=>'AdminFunctions\KindAdminController@index'
	]);
	
	Route::get('/admin/chart_delivery',[
			'as'=>'chartDelivery',
			'uses'=>'AdminFunctions\AdminController@deliveryChart'
	]);
	Route::get('/admin/chart_product', [
			'as'=>'chartProduct',
			'uses'=>'AdminFunctions\AdminController@productChart'
	]);
	Route::get('/admin/chart_paying',  [
			'as'=>'chartPaying', 
			'uses'=>'AdminFunctions\AdminController@paidChart'
	]);
	Route::get('/admin/chart_sold', [
			'as'=>'chartSold',
			'uses'=>'AdminFunctions\AdminController@soldChart'
	]);
	
	Route::post('admin/addToDoList',[
			'uses' => 'AdminFunctions\ToDoListController@addToDoList',
			'as' => 'addToDoList',		
	]);
	
	Route::get('admin/showToDoList',[
			'uses' => 'AdminFunctions\ToDoListController@index',
			'as' => 'showToDoList',
	]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');

Route::get('/pdf/{id}', function ($id) {

	
	$buying = App\Buyings::where([
			['id','=',$id],
	])->get();
	
	$admin_data =  DB::table('roles_has_users')
	->join('users', 'roles_has_users.users_id', '=', 'users.id')
	->select('users.*')
	->where([
			['roles_id','=','4'],
	])->get();
	
	$pdf=PDF::loadView('faktury',['buying'=>$buying], ['admin_data'=> $admin_data]);
	return $pdf->download('faktura_VAT_'.$id.'.pdf');
	
})->name('billsPDF');



