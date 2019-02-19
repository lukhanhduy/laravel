<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = "permissions";

    protected $primaryKey = 'permissionId';
    
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'permissionId','roleId','rules','status'
    ];
    public function role()
    {
        return $this->hasMany('App\Modles\Role','roleId','roleId');
    }
}
