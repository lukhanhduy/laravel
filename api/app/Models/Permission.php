<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $primaryKey = 'permissionId';

    protected $fillable = [
        'permissionId','roleId','rules'
    ];
    public function role()
    {
        return $this->hasMany('App\Modles\Role','roleId','roleId');
    }
}
