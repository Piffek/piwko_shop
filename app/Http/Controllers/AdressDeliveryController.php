<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AdressDeliveryRepository as AdressDelivery;

class AdressDeliveryController extends Controller
{
    
    public function __construct(AdressDelivery $adressDelivery){
        $this->adressDelivery = $adressDelivery;
    }


    public function index(){
        $add_adress = $this->adressDelivery->where('id_user', Auth::user()->id)->get();
    	return view('add_adress_delivery.index',compact('add_adress'));
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdressDelivery $adressDelivery
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->adressDelivery->create(['id_user'=>Auth::id()] + $request->all());
    	Session::flash('success', 'Dodano Nowy adres.');
        
    	return redirect()->action('AdressDeliveryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdressDelivery $adressDelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $this->adressDelivery->delete($id);
    	return back()->with('status', 'Usunięto.');
    }
}
