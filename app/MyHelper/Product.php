<?php 

namespace App\MyHelper;

class Product
{
	public function decreaseInventory($amount)
	{
		$this->ilosc -= $amount;
		$this->save;
	}
	
	public function recordPurchase($amount)
	{
		$this->zakupienia += $amount;
		$this->save();
	}
}

?>