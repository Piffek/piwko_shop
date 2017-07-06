<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Add_adress_delivery;
use Session;
use Illuminate\Support\Facades\Auth;

class Adress_deliveryController extends Controller
{

    public function index(){
    	$add_adress = Add_adress_delivery::whereid_user(Auth::user()->id)->get();
    	return view('add_adress_delivery.index',compact('add_adress'));
    }

    public function store(Request $request){
    	Add_adress_delivery::create(['id_user'=>Auth::id()] + $request->all());
    	Session::flash('success', 'Dodano Nowy adres.');
    	return redirect()->action('Adress_deliveryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Add_adress_delivery $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Add_adress_delivery $id){
    	$id->delete();
    	return back()->with('status', 'Usunięto.');
    }
}
