<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Dane;
use Session;

class DataCustomerController extends Controller
{
    public function index(User $user){
        $data_users = $user->getUser('id', Auth::user()->id);
        return view('data.index', compact('data_users'));
        
    }
    
    public function edit(User $user, $id){
    	$data_users = $user->findUser($id);
    	return view('data.edit',compact('data_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $id){
    	$id->update($request->all());
    	Session::flash('success','Operacja wykonana prawidłowo.');
    	return redirect()->action('DataCustomerController@index'); 
    }
}
