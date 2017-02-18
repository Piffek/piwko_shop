<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;
use Session;
use DB;
use View;

use App\Buyings;

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
	$productChart = DB::table('buyings')->selectRaw('count(id) as buyings_count, product as products')->groupBy('products')->get();
	$product = $productChart->keyBy('products');
	$productsWithDB = Items::all();
	return view('admin.chart.productsChart',compact('product', 'productsWithDB'));

	}
	
	public function soldChart()
	{
		$soldChart = DB::table('buyings')->selectRaw('count(id) as buyings_count, dayofweek(created_at) as weekday')->groupBy('deli')->get();
		$sold = $soldChart->keyBy('weekday');
		return view('admin.chart.soldChart',compact('sold'));
		
	}
	
	public function deliveryChart()
	{
		$deliveryChart = new ChartAdmin('buyings', 'delivery', 'UPS', 'DPD','delivery2','admin.chart.deliveryChart');
		return $deliveryChart->chartDelivery();

		/*$delivery2 = DB::table('buyings')->selectRaw('count(id) as buyings_count, delivery as deli')->groupBy('deli')->get();
		$dayUPS = DB::table('buyings')->selectRaw('count(id) as buyings_count, dayofweek(created_at) as weekday')->where('delivery','UPS')->groupBy('weekday')->get();
		$dayDPD = DB::table('buyings')->selectRaw('count(id) as buyings_count, dayofweek(created_at) as weekday')->where('delivery', 'DPD')->groupBy('weekday')->get();
		$UPS=$dayUPS->keyBy('weekday');
		$DPD=$dayDPD->keyBy('weekday');*/
		//return View::make('admin.chart.deliveryChart',compact('UPS','DPD','delivery2'));
	}
	
	public function paidChart()
	{
		$deliveryChart = new ChartAdmin('buyings', 'paying', 'przedplata', 'pobranie','Calosc','admin.chart.paidChart');
		return $deliveryChart->chartDelivery();
	}






}