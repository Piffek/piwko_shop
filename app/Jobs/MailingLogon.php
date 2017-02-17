<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
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
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id,$dbName,$whichDB)
    {
    	$this->id = $id;
    	$this->dbName = $dbName;
    	$this->whichDB = $whichDB;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    	$admin_data =  DB::table('roles_has_users')
    	->join('users', 'roles_has_users.users_id', '=', 'users.id')
    	->select('users.*')
    	->where([
    			['roles_id','=','4'],
    	])->first();
    	 

    	$customers = DB::table($this->whichDB)->where($this->dbName,$this->id)->get();
    	
    	foreach ($customers as $customer)
    	{
   
    		$customers_id = DB::table($this->whichDB)->where('id',$customer->id)->get();
    	
    		$pdf = \PDF::loadView('emails.bills_logout', array('customers_id' => $customers_id, 'admin_data' =>$admin_data));
    		\Mail::send('emails.thanks_for_buyings', array('customers_id' => $customers_id,'admin_data' =>$admin_data), function($message) use($pdf,$customer)
    		{
    			if(empty($customer->email))
    			{
    				$emails = User::where('id', $customer->id_user)->get();
    				foreach($emails as $email)
    				{
    					$userEmail  = $email->email;
    				}
    			}else
    			{
    				$userEmail = $customer->email;
    			}

    			$message->from('patrykpiwko123412@com', 'John Smith')->subject('Zakup'.$customer->id.'');
    			$message->to($userEmail, 'John Smith')->subject('Zakup'.$customer->id.'');
    			
    			$message->attachData($pdf->output(), 'faktura_nr_'.$customer->id.'.pdf');
    		});
    	}
    	
    }
}
