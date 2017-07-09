<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ItemsRepository as Items;
use Session;

class ProductController extends Controller
{
    
    public function __construct(Items $item){
        $this->item = $item;
    }
    
    public function getAddToBasket(Request $request, $id){
        $this->addToBasket($request->all(), $id);
	    
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
    
    public function addToBasket($request, $id){
        foreach($this->item->where('id', $id)->get() as $oneProduct){
            $product = array(
                'all_price' => $oneProduct['price']*$request['amount'],
                'random_id' => $request['random_id_product'],
                'product' => $oneProduct['product'],
                'price' => $oneProduct['price'],
                'amount' => $request['amount'],
                'id' => $id,
            );
            session()->push('basket', $product);
        }
    }
}
