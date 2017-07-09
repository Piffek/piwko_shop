<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baskets;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository as User;
use App\Repositories\AdressDeliveryRepository as AdressDelivery;
use App\Repositories\BasketsRepository as Baskers;

class DealController extends Controller
{
    
    public function __construct(User $user, AdressDelivery $adressDelivery, Baskers $basket){
        $this->user = $user;
        $this->adressDelivery = $adressDelivery;
        $this->basket = $basket;
    }
    
    /**
     * Show form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){	
        $data_users = $this->user->where('id', Auth::user()->id)->get();
        $data_deals = $this->adressDelivery->where('id_user', Auth::user()->id)->get();
        $baskets = $this->basket->where('id_user', Auth::user()->id)->get();
 
    	return View::make('transaction')
    	->with(compact('data_users'))
    	->with(compact('data_deals'))
    	->with(compact('baskets'));
    }
}
