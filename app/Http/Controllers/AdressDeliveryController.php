<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AdressDeliveryRepository as AdressDelivery;

class AdressDeliveryController extends Controller
{


    public function index(AdressDelivery $adressDelivery){
        $add_adress = $adressDelivery->where('id_user', Auth::user()->id)->get();
    	return view('add_adress_delivery.index',compact('add_adress'));
    }

    public function store(Request $request, AdressDelivery $adressDelivery){
        $adressDelivery->create(['id_user'=>Auth::id()] + $request->all());
    	Session::flash('success', 'Dodano Nowy adres.');
        
    	return redirect()->action('AdressDeliveryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Add_adress_delivery $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdressDelivery $id){
    	$id->delete();
        
    	return back()->with('status', 'Usunięto.');
    }
}
