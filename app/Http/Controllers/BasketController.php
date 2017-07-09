<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BasketsRepository as Baskets;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;


class BasketController extends Controller
{
    public function __construct(Baskets $basket){
        $this->basket = $basket;
    }
    
    /**
     * Show basket.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if (Auth::check()){ 
    	    $basket = $this->basket->where('id_user', Auth::user()->id)->get();
	    	return view('basket.index', compact('basket'));
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
     * Add new product to basket.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    	if($this->basket->orIsset($request->product)){
    		return back()->with('warning', 'Masz już ten produkt w koszyku.');
    	}
    	
    	$this->basket->create(['id_user'=>Auth::id()] + $request->all());
        return back()->with('success', 'Dodano do koszyka!.');
    	
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Baskets $id
     * @return \Illuminate\Http\Response
     */
    public function changeAmount(Request $request, $id){
        $this->basket->update($request->all(), $id);
    	Session::flash('success', 'zmieniono ilosc.');
    	return redirect()->back();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  Baskets  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $this->basket->delete($id);
    	return back()->with('status', 'Usunięto.');
    }
    
    
}
