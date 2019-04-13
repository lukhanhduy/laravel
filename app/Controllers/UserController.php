<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;
use HandleHttp;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    //
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }
    public function ping(){
        return HandleHttp::responseSuccess(["code"=>200,"message"=>'ok',"data"=> []]);
    }
    
    // this function for front end 

    public function fnLogin($array = []){
        // return view
        return [];
    }
    public function doLogin($array = []){
        return [];
    }
}
