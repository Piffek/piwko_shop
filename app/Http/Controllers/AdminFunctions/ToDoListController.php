<?php

namespace App\Http\Controllers\AdminFunctions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ToDoList;
use App\User;


class ToDoListController extends Controller
{  
    public function index(){
    	//$todolist = ToDoList::all();
	    //$todolist = User::find()->toDoList()->where('id_user', Auth::user()->id)->get;
        return $todolist;
    }
    

    public function addToDoList(Request $request){
		ToDoList::create($request->all());
    }
}
