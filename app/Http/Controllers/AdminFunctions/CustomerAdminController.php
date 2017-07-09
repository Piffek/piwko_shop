<?php

namespace App\Http\Controllers\AdminFunctions;

use Illuminate\Http\Request;
use App\Repositories\RolesRepository as Roles;
use App\Repositories\RolesHasUsersRepository as RolesHasUser;
use App\Repositories\UserRepository as User;
use App\Http\Controllers\Controller;
use View;
use Carbon\Carbon;
use Session;

class CustomerAdminController extends Controller
{
    public function __construct(User $user, Roles $roles, RolesHasUser $rolesHasUser){
        $this->user = $user;
        $this->roles = $roles;
        $this->rolesHasUser = $rolesHasUser;
    }

    public function index(User $user){
    	$all_users = $this->user->all();
    	return view('admin.customers.customers',compact('all_users'));
    }
    
    
    public function viewNewUser(Carbon $carbon){
        $current = $carbon->now();
    	$today = $current->toDateString();
    	$new_users_todays = $this->user->where('created_at', $today)->get();
    	return view('admin.customers.new_customers', compact('new_users_todays'));
    
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    public function showOneCustomers($id){
        $user = $this->user->find($id);
    	return view('admin.customers.show_one_customers',compact('user'));
    	 
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    public function editCustomers($id){
    	$user = $this->user->find($id);
    	$rolesHas = $this->user->find($id)->roles;
    	$roles = $this->roles->all();
    	return view('admin.customers.edit_customers')
    	->with('user', $user) 
    	->with('rolesHas', $rolesHas)
    	->with('roles', $roles);
    	
    }


    

    public function changeRole(Request $request, $id){    	
        $role = $this->rolesHasUser->update(array('roles_id' => $request->roles_id), $id, 'users_id');
		Session::flash('success', 'Zmieniono role');
		return redirect()->back();
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
        Session::flash('success', 'Dane klienta zmieniono pomyślnie');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id){
    	$id->delete();
    	Session::flash('success', 'Usunięto klienta');
    	return redirect()->action('Admin\CustomerAdminController@index');
    }
}
