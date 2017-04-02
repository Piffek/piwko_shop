<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baskets;
use App\User;
use App\Items;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;


class BasketController extends Controller
{
	use MyTrait\ExampleTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if (Auth::check())
    	{  	
	    	$basket = Baskets::where('id_user',Auth::user()->id)->get();
	    	return view('basket.index',compact('basket'));
    	}
    	return view('basket.index');
    }
    

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('basket');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

		$basket = new Baskets();
		if($basket->orIsset($request->product))
		{
			return back()->with('warning', 'Masz już ten produkt w koszyku.');
		}else 
		{
			Baskets::create(['id_user'=>Auth::id()] + $request->all());
			return back()->with('status', 'Dodano do koszyka!.');
		}
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Baskets $id
     * @return \Illuminate\Http\Response
     */

    public function changeAmount(Request $request, Baskets $id)
    {
    	$id->update($request->all());
    	Session::flash('success','zmieniono ilosc.');
    	return redirect()->back();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  Baskets  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baskets $id)
    {
    	$id->delete();
    	return back()->with('status', 'Usunięto.');
    }
    
    
}
