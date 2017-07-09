<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ItemsRepository as Item;

class HomePageController extends Controller
{	
    public function __construct(Item $item){
        $this->item = $item;
    }
    
    public function index(){
        $products= $this->item->all();
	    
        return view('homePage',compact('products'));
    }
}
