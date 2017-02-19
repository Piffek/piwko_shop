<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;
use Session;
use App\Buyings;

class OrdersAdminController extends Controller
{
	
	
	public function index($user_id)
	{
		$orders_this_customers = Buyings::where('id_user',$user_id)->get();
		return view('admin.orders.orders_this_customers',compact('orders_this_customers'));
	}
	
	public function allOrders()
	{
		$all_orders = Buyings::orderBy('id', 'desc')->get();
		return view('admin.orders.allOrders',compact('all_orders'));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Buyings  $id
	 * @return \Illuminate\Http\Response
	 */
	public function thisOrder(Buyings $id)
	{
		$this_order = clone $id;
		return view('admin.orders.thisOrder',compact('this_order'));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Buyings  $id
	 * @return \Illuminate\Http\Response
	 */
	public function deleteOrder(Buyings $id)
	{
		$id->delete();
		Session::flash('success','Usunięto zamówienie.');
		return redirect()->action('Admin\OrdersAdminController@allOrders');
	}





}