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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$buying = Buyings::where('id_user',Auth::user()->id)->paginate('10');
    	return view('buying',compact('buying'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, StoreCashier $cashier)
    {

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
