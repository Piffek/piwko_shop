<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baskets;
use View;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\AddAdressDelivery;
use DB;

class DealController extends Controller
{
    public function index(){	
    	$data_users = User::whereid(Auth::user()->id)->get();
    	$data_deals = AddAdressDelivery::whereid_user(Auth::user()->id)->get();
    	$baskets = Baskets::where('id_user', Auth::user()->id)->get();
 
    	return View::make('transaction')
    	->with(compact('data_users'))
    	->with(compact('data_deals'))
    	->with(compact('baskets'));
    }
}
