<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Session;

class ProductController extends Controller
{
	

	public function getAddToBasket(Request $request, $id)
    {
    	$basket = new Items();
    	$basket->addToBasket($request->all(), $id);
    	return redirect()->back()->with('success', 'Dodano do koszyka');
			
    }

    
    
    public function getBasket()
    {
    	$products = session('basket');
    	return view('koszyk.koszyk_goscia')->with(array(
    			'products'    => $products,
    	));
    	//return view('koszyk.index',compact('products'));
    }
    
    public function getSummary()
    {
    	$products = session('basket');
    	return view('transakcja_gosc')->with(array(
    			'products' => $products,
    			
    	));
    	//return dd($products);
    }
    
    
    public function delete($id)
    {
    	
    	$products = session('basket');
    	foreach ($products as $key => $product)
    	{
    		if($product['random_id'] == $id)
    		{
    			unset($products[$key]);
    		}
    	}
    	session()->put('basket', $products);
    	return redirect()->back()->with('success', 'Usunięto');
    	//put back in session array without deleted item
    	//then you can redirect or whatever you need
    
    }
}