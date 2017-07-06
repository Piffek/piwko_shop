<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Session;

class ProductController extends Controller
{
    public function getAddToBasket(Request $request, $id){
    	$basket = new Items();
    	$basket->addToBasket($request->all(), $id);
	    
    	return redirect()->back()->with('success', 'Dodano do koszyka');		
    }

    public function getBasket(){
    	$products = session('basket');
    	return view('basket.index')->with(array(
    	    'products'    => $products,
    	));
    }
    
    public function getSummary(){
    	$products = session('basket');
    	return view('transactionGuestPage')->with(array(
    	    'products' => $products,	
    	));
    }
    
    
    public function delete($id){
    	$products = session('basket');
    	foreach ($products as $key => $product){
    	    if($product['random_id'] == $id){
    	        unset($products[$key]);
	        }
    	}
    	session()->put('basket', $products);
	    
    	return redirect()->back()->with('success', 'Usunięto');
    
    }
}
