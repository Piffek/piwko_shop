<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\Basket;
use Session;

class HomePageController extends Controller
{	
    public function index(){
        $products= Items::all();
        return view('homePage',compact('products'));
    }
}
