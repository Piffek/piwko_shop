<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Repositories\ItemsRepository as Items;

class ProductController extends Controller
{
    
    public function __construct(Items $item){
        $this->item = $item;
    }
    

    /**
     * Redirect to one product after add to basket.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Items $id
     * @return \Illuminate\Http\Response
     */
    public function getAddToBasket(Request $request, $id){
        $this->addToBasket($request->all(), $id);
	    
    	return redirect()->back()->with('success', 'Dodano do koszyka');		
    }

    
    /**
     * Get basket.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBasket(){
    	$products = session('basket');
    	return view('basket.index')->with(array(
    	    'products'    => $products,
    	));
    }
    
    /**
     * Get name and price sum product with basket.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSummary(){
    	$products = session('basket');
    	return view('transactionGuestPage')->with(array(
    	    'products' => $products,	
    	));
    }
    
    
    /**
     * Delete product with basket.
     * @param Items $id
     * @return \Illuminate\Http\Response
     */
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
    
    /**
     * Add to basket
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  Items $id
     * @return \Illuminate\Http\Response
     */
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
