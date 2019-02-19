<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\User::class;
    }
}