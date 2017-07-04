<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RolesHasUsers extends Model
{
	protected $fillable = [
	    'users_id', 'roles_id',
	];
	
	public function selectCountRoleCurrentUser(){
		
		return RolesHasUsers::where('users_id',Auth::user()->id)->get()->count();
		
	}
}
