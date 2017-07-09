<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class BuyingsRepository extends Repository{
    
    public function model(){
        return 'App\Buyings';
    }

    
}