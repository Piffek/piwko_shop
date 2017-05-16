<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baskets extends Model
{
	protected $fillable = [
			'id','id_product','product', 'price', 'amount', 'id_user', 'updated_at'
	];
	
	protected $hidden = [
			'remember_token',
	];
	
	protected $table = 'Baskets';
	
	
	public function orIsset($product){
		foreach($this->all() as $productInDb){
			if($productInDb->product === $product){
				return true;
			}
		}
	}
	
	
}
