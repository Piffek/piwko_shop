<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Add_adress_delivery;
use Session;
use Illuminate\Support\Facades\Auth;

class Adress_deliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$add_adress = Add_adress_delivery::whereid_user(Auth::user()->id)->get();
    	return view('add_adress_delivery.index',compact('add_adress'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	//$dane = User::find(Auth::user()->id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	Add_adress_delivery::create($request->all());
    	Session::flash('success','Dodano Nowy adres.');
    	return redirect()->action('Adress_deliveryController@index');
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
     * @param  \App\Add_adress_delivery $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Add_adress_delivery $id)
    {
    	$id->delete();
    	return back()->with('status', 'Usunięto.');
    }
}
