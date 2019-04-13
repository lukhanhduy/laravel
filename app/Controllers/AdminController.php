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
    /**
     * this function to login to admin and get token
     */
    public function fnLogin(Request $request){
        $email = Helper::get($request,'email','');
        $password = Helper::get($request,'password','');
        $result = $this->doLogin([$email,$password]);
        return $result;
    }
    /**
     * this function handle to login and get token
     */
    public function doLogin($array = []){
        return $array;
    }
}
