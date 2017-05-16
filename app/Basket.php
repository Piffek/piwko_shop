<?php

namespace App;


class Basket 
{
	public $items = null;
	public $totalPrice = 0;
	public $totalAmount = 0;
	
	function _construct($oldBasket){
		if ($oldBasket){
			$this->items = $oldBasket->items;
			$this->totalPrice = $oldBasket->totalPrice;
			$this->totalAmount = $oldBasket->totalAmount;
		}
	}
	
	public function add($item, $id){
		$storedItem = ['amount' => 0, 'price' => $item->cena, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}
		$storedItem['amount']++;
		$storedItem['price'] = $item->cena * $storedItem['amount'];
		$this->items[$id] = $storedItem;
		$this->totalAmount++;
		$this->totalPrice += $item->cena;

	}
	
}
    
