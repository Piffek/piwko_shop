<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\LogOnData;
use Session;
use App\User;
use App\Mail\ConfirmationAccount;
use DB;
use Carbon\Carbon;
use App\Jobs\MailingLogon;


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
    public function create(Request $request)
    {	
    	
  	
    	
    	$products = session('basket');
    	foreach($products as $produkt)
    	{
    		$nazwa_produktu = $produkt['produkt'];
    		$cena = $produkt['cena'];
    		$ilosc = $produkt['ilosc'];
    		
    		$add_logondata= new LogOnData;
    		$add_logondata -> firstname = $request->input('firstname');
    		$add_logondata -> lastname= $request->input('lastname');
    		$add_logondata -> email = $request->input('email');
    		$add_logondata -> street = $request->input('street');
    		$add_logondata -> city= $request->input('city');
    		$add_logondata -> postcode = $request->input('postcode');
    		$add_logondata -> firstnameonaccount= $request->input('firstnameonaccount');
    		$add_logondata -> lastnameonaccount= $request->input('lastnameonaccount');
    		$add_logondata -> cardnumber= $request->input('cardnumber');
    		$add_logondata -> billingstreet= $request->input('billingstreet');
    		$add_logondata -> billingcity= $request->input('billingcity');
    		$add_logondata -> billingpostcode= $request->input('billingpostcode');
    		$add_logondata -> phone= $request->input('phone');
    		$add_logondata -> companyname= $request->input('companyname');
    		$add_logondata -> nip= $request->input('nip');
    		$add_logondata -> product= $produkt['produkt'];
    		$add_logondata -> id_transaction = $produkt['random_id'];
    		$add_logondata -> amount = $produkt['ilosc'];
    		$add_logondata -> price = $produkt['cena'];
			$add_logondata -> paying = $request->paying;
			$add_logondata -> delivery_method = $request->delivery_method;
    		$add_logondata-> save();
    		dispatch(new MailingLogon($produkt['random_id'], 'id_transaction', 'LogOnData'));

    	}
    	
    	
    	
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
