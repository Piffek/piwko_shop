<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Items extends Model
{
	protected $fillable = [
	    'id','product','size', 'price', 'kind', 'intended','general_size','amount','desc','promotion',
	    'percent_promotion' ,'text_promotion','buy_amount',
	];
	protected $hidden = [
	    'remember_token',
	];
	protected $table = 'Items';
	
	public function decreaseInventory($amount){
		$this->amount -= $amount;
		$this->update();
	}
	
	public function recordPurchase($amount){
		$this->buy_amount += $amount;
		$this->update();
	}
	
	public function addToBasket($request, $id){
		foreach($this->where('id',$id)->get() as $oneProduct){
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
