<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;
use Session;
use DB;
use View;

class AdminController extends Controller
{
	
	public function index()
	{
		return view('admin.index');
	}
	
	public function productChart()
	{
		//DB::table('booking')->selectRaw('count(id) as bookings_count, dayofweek(created_at) as weekday')->groupBy('weekday')->get();
		//return view('admin.chart.productsChart');
	$day = DB::table('buyings')->selectRaw('count(id) as buyings_count, dayofweek(created_at) as weekday')->groupBy('weekday')->get();

	return view('admin.chart.productsChart',compact('day'));

	}
	
	public function soldChart()
	{
		$delivery = DB::table('buyings')->selectRaw('count(id) as buyings_count, delivery as deli')->groupBy('deli')->get();

		return view('admin.chart.soldChart',compact('delivery'));
	}
	
	public function deliveryChart()
	{
		$delivery2 = DB::table('buyings')->selectRaw('count(id) as buyings_count, delivery as deli')->groupBy('deli')->get();
		$dayUPS = DB::table('buyings')->selectRaw('count(id) as buyings_count, dayofweek(created_at) as weekday')->where('delivery','UPS')->groupBy('weekday')->get();
		$dayDPD = DB::table('buyings')->selectRaw('count(id) as buyings_count, dayofweek(created_at) as weekday')->where('delivery','DPD')->groupBy('weekday')->get();
		
		return View::make('admin.chart.deliveryChart',compact('dayUPS','dayDPD','delivery2'));
	}
	
	public function paidChart()
	{
		return view('admin.chart.paidChart');
	}






}