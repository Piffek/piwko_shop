<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function create(Request $request)
    {
    	
    	if(empty($request -> id_adress_delivery))
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
   		
    		$items = Items::where('id', $basket->id_produktu)->get();
    		foreach ($items as $item)
    		{
	    		$sum = $item->zakupienia + $basket->ilosc;
	    		$min = $item->ilosc - $basket->ilosc; 
	    		Items::where('id', $basket->id_produktu)->update(array('zakupienia'=>$sum, 'ilosc'=>$min));
    		}
    		
    		
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
    	return redirect()->action('BuyingController@index');
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
