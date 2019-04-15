<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;

class AdminRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Admin::class;
    }
    public function findRole(){
        return $this->model()->role();
    }
    public function findPermission(){
        return $this->model()->permission();
    }
    public function findAll(){
        $model = $this->model();
        return $this->findWhereNotIn("status",[config('global.status.inactive'),config('global.status.delete')]);
    }
}