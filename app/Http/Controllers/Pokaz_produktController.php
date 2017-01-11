<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\User;
use App\Koszyks;
use Illuminate\Support\Facades\Auth;
use Session;

class Pokaz_produktController extends Controller
{
	
	

    public function index($id)
    {
    	//return $id;
    	$items = Items::whereId($id)->first();
    	if (Auth::check()) 
    	{
    		$user = User::wherename(Auth::user()->name)->get();
    	
	    	foreach($user as $users)
	    	{
	    		$koszyk = $users->id;
	    	}
	    	return view('pokaz_produkt.index',['items' => $items ,'koszyk' => $koszyk]);
    	}
    	return view('pokaz_produkt.index',['items' => $items]);
    	
       
       
    }
    
   
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
