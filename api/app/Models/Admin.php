<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admins";

    protected $primaryKey = 'adminId';

    protected $fillable = [
        'adminId','firstName', 'lastName', 'email', 'password', 'roleId'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne('App\Modles\Role','roleId','roleId');
    }
    public function permission()
    {
        return $this->hasOne('App\Modles\Permission','roleId','roleId');
    }
}
