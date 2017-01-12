<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Buyings;
use App\LogOnData;
use Carbon\Carbon;
use View;

class AdminController extends Controller
{
	
	public function index()
	{
		$current = Carbon::now();
		$current = new Carbon();
		 

			
		$today = $current->toDateString();
		$new_user = User::where('created_at', $today)->count();
			
		$new_order = Buyings::where('created_at',$today)->count();
			
		$new_order_from_singoff = LogOnData::where('created_at',$today)->count();
		//return view('admin.index',compact('new_user'),compact('new_order'),compact('new_order_from_singoff'));
		return View::make('admin.index')
		
		->with(compact('new_user'))
		
		->with(compact('new_order'))
		
		->with(compact('new_order_from_singoff'));
	}
	
	public function ViewNewUser()
	{
		
	}
	
	public function ViewNewOrder()
	{
		
	}
	
	public function ViewNewOrderFronSingOff()
	{
		
	}




}