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
	    	$koszyk = Koszyks::where('id_user',Auth::user()->id)->get();
	    	return view('koszyk.index',compact('koszyk'));
    	}
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
    	Koszyks::create($request->all());
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
     * @param  Koszyks  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Koszyks $id)
    {
    	$id->delete();
    	return back()->with('status', 'Usunięto.');
    }
    
    
}
