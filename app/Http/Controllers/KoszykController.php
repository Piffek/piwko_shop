<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Koszyks;
use App\User;
use App\Items;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class KoszykController extends Controller
{
	
	
	


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if (Auth::check())
    	{
	    	$koszyk = DB::table('items')
	    	->join('koszyks', 'items.id', '=', 'koszyks.id_produktu')
	    	->select('items.produkt','koszyks.ilosc','koszyks.cena','koszyks.id')
	    	->whereid_user(Auth::user()->id)
	    	->get();
	    	return view('koszyk.index',compact('koszyk'));
    	}
    	
    	//$koszyk = Koszyks::whereid_user(Auth::user()->id)->get();
    	return view('koszyk.index');
    }
    

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('koszyk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//Koszyks::create($request->all());
    	$add_koszyks = new Koszyks;
    	$add_koszyks -> id_produktu = $request->id_produktu;
    	$add_koszyks -> cena = $request->cena;
    	$add_koszyks -> ilosc = $request->ilosc;
    	$add_koszyks -> id_user = Auth::user()->id;
    	$add_koszyks -> save();
    	
    	return back()->with('status', 'Dodano do koszyka!.');
    	
    	

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
    	$koszyk = Koszyks::find($id);
    	$koszyk->delete();
    	return back()->with('status', 'Usunięto.');
    }
    
    
}
