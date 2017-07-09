<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\RolesHasUsers;
use App\Roles;

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
    public function index(Roles $role, RolesHasUsers $roleHasUser){
    	
    	$roleId = $role->selectWhereRoleIsUser();
    	$count = $roleHasUser->selectCountRoleCurrentUser();
    	if($count===0){
    		$roleHasUser->users_id = Auth::user()->id;
    		$roleHasUser->roles_id = $roleId->id;
    		$roleHasUser->save();
    		return view('home');
    		
    	}
    	else
    	{
    		return redirect()->action('HomePageController@index');
    	}
    }
}
