<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;
use Session;
use DB;


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
		$delivery = DB::table('buyings')->selectRaw('count(id) as buyings_count, delivery as deli')->groupBy('deli')->get();
		//$day = DB::table('buyings')->selectRaw('count(id) as buyings_count, dayofweek(created_at) as weekday, delivery as deli')->groupBy('weekday')->get();

			//return dd($day);

		return view('admin.chart.deliveryChart',compact('delivery'));
	}
	
	public function paidChart()
	{
		return view('admin.chart.paidChart');
	}






}