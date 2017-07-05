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
    	$buyings = Buyings::where('id_user', Auth::user()->id)->paginate('10');
    	return view('buying', compact('buyings'));
    }

    public function create(Request $request, StoreCashier $cashier){
    	$this->validate($request, [
    		'city' => 'required_if:id_adress_delivery,0',
    		'street' => 'required_if:id_adress_delivery,0',
    	]);
    	
    	if(empty($request -> id_adress_delivery)){
    	    $adress = $this->setDataDelivery(Auth::user()->city, Auth::user()->street, '0', $request);
    		
    	}else if(!empty($request -> id_adress_delivery)){
    	    $adress = $this->setDataDelivery($request -> city, $request -> street, $request -> id_adress_delivery, $request);
    	}
    		
    	$cashier->checkout( $adress );
    	Session::flash('success','Zakupiono produkt.');
        
    	return redirect()->action('BuyingController@index');

    }
    
    public function setDataDelivery($cityAuth, $streetAuth, $idDelivery, $request=NULL){
        $city = $cityAuth;
        $street = $streetAuth;
        $id_adress_delivery = $idDelivery;
        $adress_delivery=array(
            'city'=>$city,
            'street'=>$street,
            'adress_delivery'=>$id_adress_delivery,
            'delivery_method'=>$request->delivery,
            'payment_method'=>$request->paying,
    );
        return $adress_delivery;
    }
}
