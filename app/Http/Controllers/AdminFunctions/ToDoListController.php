<?php

namespace App\Http\Controllers\AdminFunctions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ToDoList;
use App\User;
use Session;


class ToDoListController extends Controller
{  
    public function index(){
    	$todolist = ToDoList::all();
	    
        return $todolist;
    }
    

    public function addToDoList(Request $request){
	ToDoList::create($request->all());
    }
}
