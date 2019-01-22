<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'roleId';

    protected $fillable = [
        'roleId','name'
    ];
    public function permission()
    {
        return $this->hasOne('App\Modles\Permission','roleId','roleId');
    }
}
