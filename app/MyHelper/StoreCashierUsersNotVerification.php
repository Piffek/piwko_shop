<?php 

namespace App\MyHelper;
use App\Items;
use App\Jobs\MailingLogon;
use App\LogOnData;

class StoreCashierUsersNotVerification
{
	public function checkout($dataNotVerificationUsers)
	{
		$products = session('basket');
		foreach($products as $produkt)
		{
		
			$add_logondata= new LogOnData;
			$add_logondata -> firstname = $dataNotVerificationUsers['firstname'];
			$add_logondata -> lastname= $dataNotVerificationUsers['lastname'];
			$add_logondata -> email = $dataNotVerificationUsers['email'];
			$add_logondata -> street = $dataNotVerificationUsers['street'];
			$add_logondata -> city= $dataNotVerificationUsers['city'];
			$add_logondata -> postcode = $dataNotVerificationUsers['postcode'];
			$add_logondata -> firstnameonaccount= $dataNotVerificationUsers['firstnameonaccount'];
			$add_logondata -> lastnameonaccount= $dataNotVerificationUsers['lastnameonaccount'];
			$add_logondata -> cardnumber= $dataNotVerificationUsers['cardnumber'];
			$add_logondata -> billingstreet= $dataNotVerificationUsers['billingstreet'];
			$add_logondata -> billingcity= $dataNotVerificationUsers['billingcity'];
			$add_logondata -> billingpostcode= $dataNotVerificationUsers['billingpostcode'];
			$add_logondata -> phone= $dataNotVerificationUsers['phone'];
			$add_logondata -> companyname= $dataNotVerificationUsers['companyname'];
			$add_logondata -> nip= $dataNotVerificationUsers['nip'];
			$add_logondata -> product= $produkt['product'];
			$add_logondata -> id_transaction = $produkt['random_id'];
			$add_logondata -> amount = $produkt['amount'];
			$add_logondata -> price = $produkt['price']*$produkt['amount'];
			$add_logondata -> paying = $dataNotVerificationUsers['paying'];
			$add_logondata -> delivery_method = $dataNotVerificationUsers['delivery_method'];
			$add_logondata-> save();
			
			$items = Items::find($produkt['id']);
			$items->decreaseInventory($produkt['amount']);
			$items->recordPurchase($produkt['amount']);
			
			dispatch(new MailingLogon($produkt['random_id'], 'id_transaction', 'LogOnData'));
		}
		session()->forget('basket');
		
		
	}
}