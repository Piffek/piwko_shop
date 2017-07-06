<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AddAdressDelivery extends Model
{
	protected $fillable = [
		'id','id_user', 'street', 'city', 'phone',
	];
	protected $hidden = [
		'remember_token',
	];
	protected $table = 'add_adress_delivery';
	
	public function getAdress($field, $what){
	    return AddAdressDelivery::where($field, $what)->get();
	}
	
	public function createAdress($field, $what, $request){
	    return AddAdressDelivery::create([$field => $what] + $request->all());
	}
}
