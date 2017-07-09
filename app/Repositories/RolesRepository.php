<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class RolesRepository extends Repository{
    
    public function model(){
        return 'App\Roles';
    }
    
    
}