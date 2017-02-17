<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koszyks extends Model
{
	protected $fillable = [
			'id','id_produktu','product', 'cena', 'ilosc', 'id_user', 'updated_at'
	];
	
	protected $hidden = [
			'remember_token',
	];
	
	protected $table = 'koszyks';
	
	
	public function orIsset($product)
	{
		foreach($this->all() as $productInDb)
		{
			if($productInDb->product === $product)
			{
				return true;
			}
		}
	}
	
	
}
