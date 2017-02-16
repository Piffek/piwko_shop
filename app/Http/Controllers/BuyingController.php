<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyHelper\StoreCashier;
use Illuminate\Support\Facades\Auth;
use App\Buyings;
use App\Koszyks;
use App\User;
use Session;
use App\Items;

class BuyingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$buying = Buyings::where('id_user',Auth::user()->id)->get();
    	
    	
    	//$buying = Buyings::whereid_user(Auth::user()->id)->get();
    	return view('kupione',compact('buying'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    
    public function create(Request $request, StoreCashier $cashier)
    {
    	
    	/*if(empty($request -> id_adress_delivery))
    	{
    		$city = Auth::user()->city;
    		$street = Auth::user()->street;
    		$id_adress_delivery = '0';
    	}else if(!empty($request -> id_adress_delivery))
    	{
    		$city = $request -> city;
    		$street = $request -> street;
    		$id_adress_delivery = $request -> id_adress_delivery;
    	}
    	
    	$baskets = Koszyks::where('id_user', Auth::user()->id)->get();
    	foreach($baskets as $basket)
    	{
    		//Dodawanie ilosci do tabeli 'zakupienia', odejmowanie zakupionej ilosci od ilosci ogólnej
    		$this->plusAmountBuyingItemsAndminusAmountItems($basket->id_produktu, $basket->ilosc);
    		
    		//Dodawanie do bazy
    		$add_buyings = new Buyings;
    		$add_buyings -> id_produktu = $basket->id_produktu;
    		$add_buyings -> product = $basket->product;
    		$add_buyings-> cena = $basket->cena;
    		$add_buyings -> ilosc = $basket->ilosc;
    		$add_buyings -> id_user = Auth::user()->id;
    		$add_buyings -> surname = Auth::user()->surname;
    		$add_buyings -> street = $street;
    		$add_buyings -> city = $city;
    		$add_buyings -> nip = Auth::user()->nip;
    		$add_buyings -> companyname = Auth::user()->companyname;
    		$add_buyings -> id_adress_delivery = $id_adress_delivery;
    		$add_buyings -> delivery = $request->delivery;
    		$add_buyings -> paying = $request->paying;
    		$add_buyings -> save();
    	}
    	Koszyks::whereid_user(Auth::user()->id)->delete();
    	Session::flash('success','Zakupiono produkt.');
    	return redirect()->action('BuyingController@index');*/
    	
    	$this->validate($request, [
    		'city' => 'required_if:id_adress_delivery,0',
    		'street' => 'required_if:id_adress_delivery,0',
    	]);
    	
    	if(empty($request -> id_adress_delivery))
    	{
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
    	}else if(!empty($request -> id_adress_delivery))
    	{
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
    

    public function plusAmountBuyingItemsAndminusAmountItems($id_produktu, $basket_amount)
    {
    	$items = Items::where('id', $id_produktu)->get();
    	foreach ($items as $item)
    	{
    		$sum = $item->zakupienia + $basket_amount;
    		$min = $item->ilosc - $basket_amount;
    		Items::where('id', $id_produktu)->update(array('zakupienia'=>$sum, 'ilosc'=>$min));
    	}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }
}
