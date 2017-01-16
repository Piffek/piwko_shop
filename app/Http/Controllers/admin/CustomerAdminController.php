<?php

namespace App\Http\Controllers\Admin;

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
    
    public function showOneCustomers($user_id)
    {
    	$users = User::where('id', $user_id)->get();
    	return view('admin.customers.show_one_customers',compact('users'));
    	 
    }
    
    public function editCustomers($user_id)
    {
    	$users = User::where('id', $user_id)->get();
    	return view('admin.customers.edit_customers',compact('users'));
    	
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
    	$user= User::find($user_id);
        $user -> name = $request -> input('name');
        $user -> surname = $request -> input('surname');
        $user -> email = $request -> input('email');
        $user -> street = $request -> input('street');
        $user -> city = $request -> input('city');
        $user -> phone = $request -> input('phone');
        $user -> companyname = $request -> input('companyname');
        $user -> nip = $request -> input('nip');
        $user -> save();
        
        Session::flash('success','Dane klienta zmieniono pomyślnie');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
    	$user= User::find($user_id);
    	$user -> delete();
    	Session::flash('success','Usunięto klienta');
    	return redirect()->action('Admin\CustomerAdminController@index');
    	//return view('admin.index');
    }
}
