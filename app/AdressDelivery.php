<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdressDelivery extends Model
{
	protected $fillable = [
		'id','id_user','user', 'street', 'city', 'phone',
	];
	protected $hidden = [
		'remember_token',
	];
	protected $table = 'add_adress_delivery';
}
