<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    protected $primaryKey = 'roleId';

    protected $fillable = [
        'roleId','roleName','status'
    ];
    public function permission()
    {
        return $this->hasOne('App\Modles\Permission','roleId','roleId');
    }
}
