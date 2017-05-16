<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyHelper\StoreCashier;
use Illuminate\Support\Facades\Auth;
use App\Buyings;
use App\User;
use Session;

class BuyingController extends Controller
{

    public function index(Request $request){
    	$buying = Buyings::where('id_user', Auth::user()->id)->paginate('10');
    	return view('buying', compact('buying'));
    }

    public function create(Request $request, StoreCashier $cashier){
    	$this->validate($request, [
    		'city' => 'required_if:id_adress_delivery,0',
    		'street' => 'required_if:id_adress_delivery,0',
    	]);
    	
    	if(empty($request -> id_adress_delivery)){
    		$city = Auth::user()->city;
    		$street = Auth::user()->street;
    		$id_adress_delivery = '0';
    		$adress_delivery=array(
    				'city'=>$city, 
    				'street'=>$street, 
    				'adress_delivery'=>$id_adress_delivery,
    				'delivery_method'=>$request->delivery,
    				'payment_method'=>$request->paying,
    		);
    	}else if(!empty($request -> id_adress_delivery)){
    		$city = $request -> city;
    		$street = $request -> street;
    		$id_adress_delivery = $request -> id_adress_delivery;
    		$adress_delivery=array(
    				'city'=>$city,
    				'street'=>$street,
    				'adress_delivery'=>$id_adress_delivery,
    				'delivery_method'=>$request->delivery,
    				'payment_method'=>$request->paying,
    		);
    	}
    		
    	 $cashier->checkout($adress_delivery);
    	Session::flash('success','Zakupiono produkt.');
        
    	return redirect()->action('BuyingController@index');

    }
}
