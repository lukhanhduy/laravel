<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;

class FileRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\User::class;
    }
}