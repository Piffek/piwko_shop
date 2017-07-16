<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class KindsRepository extends Repository{
    
    public function model(){
        return 'App\Kinds';
    }
    
    
}