<?php

namespace App\Repositories;


use App\Repositories\Eloquent\Repository;

class UserRepository extends Repository{
    
    public function model(){
        return 'App\User';
    }

    
    
}