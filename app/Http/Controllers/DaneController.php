<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Dane;
use Session;

class DaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_users = User::whereid(Auth::user()->id)->get();
        return view('dane.index',compact('data_users'));
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
    	$data_users = User::find($id);
    	return view('dane.edit',compact('data_users'));
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
    	
    	
    	$dane = User::find($id);
    	//$dane = new User;
    	$dane -> surname = $request->input('surname');
    	$dane ->  email = $request-> input('email');
    	$dane ->  city = $request-> input('city');
    	$dane -> street = $request-> input('street');
    	$dane ->phone= $request-> input('phone');
    	$dane -> companyname = $request ->input('companyname');
    	$dane ->nip = $request-> input('nip');
    	$dane -> save();
    	//return back()->with('status', 'Zmieniono dane.');
    	Session::flash('success','Operacja wykonana prawidłowo.');
    	return redirect()->action('DaneController@index');

    	 
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
