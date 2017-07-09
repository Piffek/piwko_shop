<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Buyings extends Model
{
	protected $fillable = [
	    'id','id_product','product', 'price', 'amount', 'id_user','surname','street','city','nip',
	    'companyname' ,'delivery','paying','id_adress_delivery', 'state',
	];
	protected $hidden = [
	    'remember_token',
	];
	protected $table = 'buyings';
	
	public function getId(){
		return $this->id;
	}
}

