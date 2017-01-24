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
		return DB::table('buyings')->selectRaw('count(id) as buyings_count, dayofweek(created_at) as weekday')->groupBy('weekday')->get();
	}
	
	public function soldChart()
	{
		return view('admin.chart.soldChart');
	}
	
	public function deliveryChart()
	{
		return view('admin.chart.deliveryChart');
	}
	
	public function paidChart()
	{
		return view('admin.chart.paidChart');
	}






}