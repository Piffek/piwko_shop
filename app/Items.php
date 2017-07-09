<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


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
	
	/*
	 * Decreate amount item during realization transaction.
	 */
	public function decreaseInventory($amount){
		$this->amount -= $amount;
		$this->update();
	}
	
	/*
	 * Add amount.
	 */
	public function recordPurchase($amount){
		$this->buy_amount += $amount;
		$this->update();
	}
	
	


}
