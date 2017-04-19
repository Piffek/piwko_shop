<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class MailToOwner extends Mailable
{
	use Queueable, SerializesModels;
	public $product, $amount, $name;
	public function __construct($product, $amount, $name)
	{
		$this->product = $product;
		$this->amount = $amount;
		$this->name = $name;
	}
	public function build()
	{
			return $this->view('emails.infoToOwnerShop')->with(array([
			 'product' => $this->product,
			 'amount' => $this->amount,
			 'name' => $this->name,
			 ]));
	}
}