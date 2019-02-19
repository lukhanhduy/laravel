<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;
use HandleHttp;
use App\Repositories\AdminRepository;
class AdminController extends Controller
{
    public function __construct(AdminRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }
    public function findAll(){
        return $this->repository->findAll();
    }
}
