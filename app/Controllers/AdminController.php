<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;
use HandleHttp;
use App\Repositories\AdminRepository;
use App\Http\Requests\AdminCreateRequest;

class AdminController extends Controller
{
    public function __construct(AdminRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }
    /**
     * this function to login to admin and get token
     */
    public function fnLogin(Request $request){
        $result = $this->doLogin($request);
        return $result;
    }
    /**
     * this function handle to login and get token
     */
    public function doLogin(Request $request){
        $email = Helper::get($request,'email','');
        $password = Helper::get($request,'password','');
        return $email;
    }
    public function fnCreate(AdminCreateRequest $request){
        // $validator->messages();
        // $email = Helper::get($request,'email','');
        // $password = Helper::get($request,'password','');
        // $phoneNumber = Helper::get($request,'phoneNumber','');
        return [];
    }
}
