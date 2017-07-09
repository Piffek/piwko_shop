<?php

namespace App\Repositories;


use App\Roles;
use App\User;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Auth;

class AddAdressDeliveryRepository extends Repository{
    
    public function model(){
        return 'App\AddAdressDelivery';
    }
   
    
}