<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddAdressDelivery;
use Session;
use Illuminate\Support\Facades\Auth;

class AdressDeliveryController extends Controller
{

    public function index(AddAdressDelivery $adress){
        $add_adress = $adress->getAdress('id_user', Auth::user()->id);
    	return view('add_adress_delivery.index',compact('add_adress'));
    }

    public function store(Request $request, AddAdressDelivery $adress){
        $adress->createAdress('id_user', Auth::id(), $request);
    	Session::flash('success', 'Dodano Nowy adres.');
    	return redirect()->action('AdressDeliveryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Add_adress_delivery $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddAdressDelivery $id){
    	$id->delete();
    	return back()->with('status', 'Usunięto.');
    }
}
