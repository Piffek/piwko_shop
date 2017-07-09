<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;


class AdressDeliveryRepository extends Repository{
    
    public function model(){
        return 'App\AdressDelivery';
    }
   
    
}