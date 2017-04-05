<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\RolesHasUsers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$id_roles = RolesHasUsers::where('users_id',Auth::user()->id)->get()->count();
    	if($id_roles===0)
    	{
    		$add_roles = new RolesHasUsers;
    		$add_roles -> users_id = Auth::user()->id;
    		$add_roles -> roles_id = '6';
    		$add_roles->save();
    		return view('home');
    	}
    	else if($id_roles>0)
    	{
    		return redirect()->action('HomePageController@index');
    	}
    }
}
