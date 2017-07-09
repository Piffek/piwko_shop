<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class RolesHasUsersRepository extends Repository{
    
    public function model(){
        return 'App\RolesHasUsers';
    }
    
    
}