<?php

namespace App\Http\Controllers\AdminFunctions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use View;
use Carbon\Carbon;
use Session;

class CustomerAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	

	
	
    public function index()
    {

    	$all_users = User::all();
    		
    	return view('admin.customers.customers',compact('all_users'));
    }
    
    
    public function viewNewUser()
    {
    	$current = Carbon::now();
    	$current = new Carbon();
    
    		
    
    	$today = $current->toDateString();

    	$new_users_todays = User::where('created_at', $today)->get();
    
    	return view('admin.customers.new_customers',compact('new_users_todays'));
    
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    
    public function showOneCustomers(User $id)
    {
    	$user= clone $id;
    	return view('admin.customers.show_one_customers',compact('user'));
    	 
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    
    public function editCustomers(User $id)
    {
    	$user= clone $id;
    	return view('admin.customers.edit_customers',compact('user'));
    	
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $id)
    {
    	$id->update($request->all());    
        Session::flash('success','Dane klienta zmieniono pomyślnie');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
    	$id->delete();
    	Session::flash('success','Usunięto klienta');
    	return redirect()->action('Admin\CustomerAdminController@index');
    }
}