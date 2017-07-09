<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;


class BasketsRepository extends Repository{
    
    public function model(){
        return 'App\Baskets';
    }
   
    public function orIsset($product){
        foreach($this->model->all() as $productInDb){
            if($productInDb->product === $product){
                return true;
            }
        }
    }
}