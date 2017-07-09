<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baskets extends Model
{
	protected $fillable = [
			'id','id_product','product', 'price', 'amount', 'id_user', 'updated_at', '_token'
	];
	
	protected $hidden = [
			'remember_token',
	];
	
	protected $table = 'Baskets';
	

	
	
}
