<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class ItemsRepository extends Repository{
    
    public function model(){
        return 'App\Items';
    }
    
}