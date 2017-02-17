<?php 

namespace App\MyHelper;
use App\Items;
use App\Koszyks;
use Illuminate\Support\Facades\Auth;
use App\Buyings;
use App\Jobs\MailingLogon;
class StoreCashier
{
	public function checkout($adress_delivery)
	{
		$baskets = Koszyks::where('id_user', Auth::user()->id)->get();
		foreach($baskets as $basket)
		{
		
			//Dodawanie do bazy
			$add_buyings = new Buyings;
			$add_buyings -> id_produktu = $basket->id_produktu;
			$add_buyings -> product = $basket->product;
			$add_buyings-> price = $basket->cena;
			$add_buyings -> amount = $basket->ilosc;
			$add_buyings -> id_user = Auth::user()->id;
			$add_buyings -> surname = Auth::user()->surname;
			$add_buyings -> street = $adress_delivery['street'];
			$add_buyings -> city = $adress_delivery['city'];
			$add_buyings -> nip = Auth::user()->nip;
			$add_buyings -> companyname = Auth::user()->companyname;
			$add_buyings -> id_adress_delivery = $adress_delivery['adress_delivery'];
			$add_buyings -> delivery = $adress_delivery['delivery_method'];
			$add_buyings -> paying = $adress_delivery['payment_method'];
			$add_buyings -> save();
			
			$items = Items::find($basket->id_produktu);
			$items->decreaseInventory($basket->ilosc);
			$items->recordPurchase($basket->ilosc);

			dispatch(new MailingLogon($add_buyings->getId(), 'id' , 'Buyings'));
		}
		Koszyks::whereid_user(Auth::user()->id)->delete();
		
	}
}

?>