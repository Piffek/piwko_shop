<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Items extends Model
{
	protected $fillable = [
			'id','produkt','wymiary', 'cena', 'rodzaj', 'przeznaczenie','wymiary_ogolne','ilosc','opis','promocja','procent_promocji' ,'tekst_promocji','zakupienia','id_adress_delivery'
	];
	
	protected $hidden = [
			'remember_token',
	];
	
	protected $table = 'Items';
	
	public function decreaseInventory($amount)
	{
		$this->ilosc -= $amount;
		$this->update();
	}
	
	public function recordPurchase($amount)
	{
		$this->zakupienia += $amount;
		$this->update();
	}
	
	
	
	
	public function addToBasket($request, $id)
	{
		foreach($this->where('id',$id)->get() as $oneProduct)
		{
			$product = array(
					'random_id' => $request['random_id_product'],
					'id' => $id,
					'produkt' => $oneProduct['produkt'],
					'cena' => $oneProduct['cena'],
					'ilosc' => $request['ilosc'],
					'cena_lacznie' => $oneProduct['cena']*$request['ilosc'],
			);
			session()->push('basket',$product);
		}
			
	}


}
