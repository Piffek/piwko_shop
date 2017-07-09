<?php 

namespace App\MyHelper;
use App\Items;
use App\Baskets;
use Illuminate\Support\Facades\Auth;
use App\Buyings;
use App\Jobs\MailingLogon;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailToOwner;

class StoreCashier
{
	public function checkout($adress_delivery){
		$baskets = Baskets::where('id_user', Auth::user()->id)->get();
		foreach($baskets as $basket){
			$add_buyings = new Buyings;
			$add_buyings -> id_adress_delivery = $adress_delivery['adress_delivery'];
			$add_buyings -> delivery = $adress_delivery['delivery_method'];
			$add_buyings -> paying = $adress_delivery['payment_method'];
			$add_buyings -> street = $adress_delivery['street'];
			$add_buyings -> city = $adress_delivery['city'];
			
			$add_buyings -> companyname = Auth::user()->companyname;
			$add_buyings -> price = $basket->price*$basket->amount;
			$add_buyings -> id_product = $basket->id_product;
			$add_buyings -> surname = Auth::user()->surname;
			$add_buyings -> id_user = Auth::user()->id;
			$add_buyings -> product = $basket->product;
			$add_buyings -> amount = $basket->amount;
			$add_buyings -> nip = Auth::user()->nip;
			$add_buyings -> state = 'W realizacji';
			$add_buyings -> save();
			
			$items = $this->item->find($basket->id_product);
			$items->decreaseInventory($basket->amount);
			$items->recordPurchase($basket->amount);
			dispatch(new MailingLogon($add_buyings->getId(), 'id' , 'Buyings'));
		}
		Baskets::whereid_user(Auth::user()->id)->delete();
		
	}
}

?>
