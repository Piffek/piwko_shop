<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\MyHelper\StoreCashierUsersNotVerification;


class LogOnDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, StoreCashierUsersNotVerification $cashier)
    {	
    	
    	$dataNotVerificationUsers = array(
    			'firstname' => $request->input('firstname'),
    			'lastname' => $request->input('lastname'), 
    			'email' => $request->input('email'),
    			'city' => $request->input('city'),
    			'street' => $request->input('street'),
    			'postcode' => $request->input('firstnameonaccount'),
    			'firstnameonaccount' => $request->input('firstnameonaccount'),
    			'lastnameonaccount' => $request->input('lastnameonaccount'), 
    			'cardnumber' => $request->input('cardnumber'), 
    			'billingstreet' =>  $request->input('billingstreet'),
    			'billingcity' => $request->input('billingcity'), 
    			'billingpostcode' => $request->input('billingpostcode'),
    			'phone' => $request->input('phone'),
    			'companyname' => $request->input('companyname'),
    			'nip' => $request->input('nip'),
    			'paying' => $request->paying,
    			'delivery_method' => $request->delivery_method,
    	);
    	
    	$cashier->checkout($dataNotVerificationUsers);
    	
    	Session::flash('success','Dziękujemy za zakup produktu, na podany mail została wysłana informacja');
    	return redirect()->action('HomePageController@index');

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
    public function destroy($id)
    {
        //
    }
}
