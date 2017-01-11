<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Session;

class ProductController extends Controller
{
	

public function getAddToBasket(Request $request, $id)
    {
    	$products = session('basket');
		if(isset($products))
		{
			foreach($products as $product)
			{
				$product_id=$product['id'];
			}
	
			
			if(isset($product_id) && $id === $product_id)
			{
				return back()->with('warning','Masz już ten produkt w koszyku');
			}else
			{
		    	$product_from_db = Items::find($id);
		    	$product['random_id'] = $request->random_id_product;
		    	$product['id'] = $id;
		    	$product['produkt'] = $product_from_db->produkt;
		    	$product['cena'] = $product_from_db->cena;
		    	$product['ilosc'] = $request->ilosc;
		    	$product['cena_lacznie'] = $product['cena']*$product['ilosc'];
		    	
		
		    	$request -> session()->push('basket', $product);
		    	//return redirect()->route('product.index');
		    	return back()->with('status', 'Dodano do koszyka!.');
			}
		}else 
		{
			$product_from_db = Items::find($id);
			$product['random_id'] = $request->random_id_product;
			$product['id'] = $id;
			$product['produkt'] = $product_from_db->produkt;
			$product['cena'] = $product_from_db->cena;
			$product['ilosc'] = $request->ilosc;
			$product['cena_lacznie'] = $product['cena']*$product['ilosc'];
			
			$request -> session()->push('basket', $product);
			//return redirect()->route('product.index');
			return back()->with('status', 'Dodano do koszyka!.');
		}
			
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
    		if($product['id'] == $id)
    		{
    			unset($products[$key]);
    		}
    	}
    	session()->put('basket', $products);
    	return redirect()->back();
    	//put back in session array without deleted item
    	//then you can redirect or whatever you need
    
    }
}