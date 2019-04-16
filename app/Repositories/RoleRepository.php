<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;

class RoleRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Role::class;
    }
    public function getAll(){
        $this->with('permissions');
        return $this->all([],['*']);
    }
}