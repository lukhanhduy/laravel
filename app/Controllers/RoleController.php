<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    /**
     * this function to get all roles by pagination
     */
    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }

    public function fnGetAll(Request $request){
        $roles = $this->repository->getAll();
        return $roles;
    }

    /**
     * this function get role by id
     */
    public function fnGetById($roleId){
        $role = $this->repository->get($roleId);
        return $role;
    }

}
