<?php

namespace App\Http\Controllers\AdminFunctions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;
use Session;
use DB;
use View;

use App\Buyings;

class AdminController extends Controller
{
	
	public function index(){
		return view('admin.index');
	}
	
	public function productChart(){
		$productChart = DB::table('buyings')->selectRaw('count(id) as buyings_count, product as products')->groupBy('products')->get();
		$product = $productChart->keyBy('products');
		$productsWithDB = Items::all();
		return view('admin.chart.productsChart',compact('product', 'productsWithDB'));
	}
	
	public function soldChart(){
		$soldChart = DB::table('buyings')->selectRaw('count(id) as buyings_count, dayofweek(created_at) as weekday')->groupBy('weekday')->get();
		$sold = $soldChart->keyBy('weekday');
		return view('admin.chart.soldChart',compact('sold'));
	}
	
	public function deliveryChart(){
		$deliveryChart = new ChartAdmin('buyings', 'delivery', 'UPS', 'DPD','delivery2','admin.chart.deliveryChart');
		return $deliveryChart->chartDelivery();
	}
	
	public function paidChart(){
		$deliveryChart = new ChartAdmin('buyings', 'paying', 'przedplata', 'pobranie','Calosc','admin.chart.paidChart');
		return $deliveryChart->chartDelivery();
	}






}
