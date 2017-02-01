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
		$all_orders = Buyings::all();
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
		$this_order= clone $id;
		return view('admin.orders.thisOrder',compact('this_order'));
	}






}