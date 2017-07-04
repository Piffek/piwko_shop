<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class ToDoList extends Model
{
	protected $fillable = [
	    'id', 'what','when', 'id_user', 'created_at', 'updated_at'
	];
	protected $table = 'todolist';
	
	
	public function taskCurrentUser(){
		
		if(Auth::check()){
			
			return ToDoList::where('id_user', Auth::user()->id)->get();
		}else{
			
			return NULL;
		}
		
	}
	
}
