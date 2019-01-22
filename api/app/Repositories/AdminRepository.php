<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;

class AdminRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\User::class;
    }
    public function findRole(){
        return $this->model()->role();
    }
    public function findPermission(){
        return $this->model()->permission();
    }
}