<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Buyings extends Model
{

	
	protected $fillable = [
			'id_produktu','product', 'cena', 'ilosc', 'id_user','surname','street','city','nip','companyname' ,'delivery','paying',
			];
	
	protected $hidden = [
			'remember_token',
	];
	
	protected $table = 'buyings';
	

}
