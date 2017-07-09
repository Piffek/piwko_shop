<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Support\Facades\Session;
use App\Repositories\UserRepository as User;

class DataCustomerController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
    }
    
    
    /**
     * Show data.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data_users = $this->user->where('id', Auth::user()->id)->get();
        return view('data.index', compact('data_users'));
        
    }
    
    /**
     * Show form to edit data user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data_users = $this->user->find($id);
    	return view('data.edit',compact('data_users'));
    }

    /**
     * Update data user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->user->update($request->all(), $id);
    	Session::flash('success','Operacja wykonana prawidłowo.');
    	return redirect()->action('DataCustomerController@index');

    	 
    }
}
