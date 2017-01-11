<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Session;
use App\User;
use Carbon\Carbon;

class AdminController extends Controller
{
	
	public function newUser()
	{
		$current = Carbon::now();
		$current = new Carbon();
		
		$today = $current->toDateString();
		$new_user = User::where('created_at', $today)->count();  
		return view('admin.index', compact('new_user'));
	}






}