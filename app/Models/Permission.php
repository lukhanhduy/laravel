<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = "permissions";

    protected $primaryKey = 'permission_id';

    protected $fillable = [
        'permission_id','role_id','rules','status'
    ];
    public function role()
    {
        return $this->hasMany('App\Modles\Role','role_id','role_id');
    }
}
