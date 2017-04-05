<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogOnData extends Model
{
	protected $fillable = [
			'firstname', 'lastname', 'email', 'street','city', 'postcode', 'firstnameonaccount', 'lastnameonaccount','cardnumber', 'billingstreet',
			'billingcity','billingpostcode',' phone','companyname','nip', 'state'
	];
	
	protected $hidden = [
			'remember_token',
	];
	
	protected $table = 'logondata';
	

	
	
}
