<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contract\RepositoryInterface;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    
    public function __construct(Container $app){
        $this->app = $app;
        $this->makeModel();
    }
    
    public function makeModel(){
        $model = $this->app->make($this->model());
        
        if(!$model instanceof Model){
            throw new \Exception('Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model');
        }
           
        return $this->model = $model;
 
    }
    
    abstract function model();
    
    public function all($columns = ['*']){
        return $this->model->get($columns);
    }

    public function find($id, $columns = []){
    }

    public function paginate($perPage = 15, $columns = []){
    }

    public function create(array $data){
        
    }

    public function update(array $data, $id){
        
    }

    public function findBy($field, $value, $columns = []){
    }

    public function delete($id){
        
    }

    
}