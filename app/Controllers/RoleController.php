<?php

namespace App\Http\Controllers\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * this function to get all roles by pagination
     */
    public function fnGetRoles(Request $request){
        $roles = $this->doGetRoles();
        return $roles;
    }

    /**
     * this function get role by id
     */
    public function fnGetRoleById(Request $request){
        return [];
    }

}
