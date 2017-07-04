<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
	protected $fillable = [
	    'id','name'
	];
	protected $table = 'roles';
	
	
	public function selectWhereRoleIsUser(){
		
		return Roles::where('name', 'User')->first();
		
	}
}
