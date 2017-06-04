<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailToOwner;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\LogOnData;
use App\RolesHasUser;
use App\User;
use DB;


class MailingLogon implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

	protected $id;
	protected $dbName;
	protected $whichDB;
	protected $userEmail;
   
    public function __construct($id,$dbName,$whichDB){
    	$this->id = $id;
    	$this->dbName = $dbName;
    	$this->whichDB = $whichDB;
    }

 
    public function handle(){
    	$admin_data =  DB::table('roles_has_users')
	    	->join('users', 'roles_has_users.users_id', '=', 'users.id')
	    	->select('users.*')
	    	->where([
		['roles_id','=','1'],
	    ])->first();
    	 
		//check data customer who get product
    	$customers = DB::table($this->whichDB)->where($this->dbName,$this->id)->get();
 
    	foreach ($customers as $customer){
    		Mail::to('patrykpiwko123412@gmail.com')->send(new MailToOwner($customer->product, $customer->amount, isset($customer->lastnameonaccount) ? $customer->lastnameonaccount : $customer->surname));
    		
			//check data customer and insert to bill
			$customers_id = DB::table($this->whichDB)->where('id',$customer->id)->get();
    	
    		$pdf = \PDF::loadView('emails.bills_logout', array('customers_id' => $customers_id, 'admin_data' =>$admin_data));
		
			//if customer has account get e-mail with table User and set to variable userEmail
			//else set to variable userEmail email with $customer->email
			if(empty($customer->email)){
				$emails = User::where('id', $customer->id_user)->get();
				foreach($emails as $email){
					$userEmail  = $email->email;
				}
			}else{
				$userEmail = $customer->email;
			}
			
			$message->from('patrykpiwko123412@com', 'John Smith')->subject('Zakup'.$customer->id.'');
			$message->to($userEmail, 'John Smith')->subject('Zakup'.$customer->id.'');
	
			$message->attachData($pdf->output(), 'faktura_nr_'.$customer->id.'.pdf');
			
    		}
    	}
    	
}
