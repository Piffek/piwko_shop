<?php

namespace App\Repositories;


use App\Roles;
use App\User;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Auth;

class UserRepository extends Repository{
    
    public function model(){
        return 'App\User';
    }
   
    public function getRolesUser(){
        foreach(Auth::user()->roles as $role){
            return $role;
        }
    }
    
}