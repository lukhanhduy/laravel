<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    protected $primaryKey = 'role_id';

    protected $fillable = [
        'role_id','role_name','status','module_id'
    ];
    public function permissions()
    {
        return $this->hasOne('App\Modles\Permission','role_id','role_id');
    }
}
