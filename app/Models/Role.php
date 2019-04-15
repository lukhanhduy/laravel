<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    protected $primaryKey = 'role_id';

    protected $fillable = [
        'role_id','role_name','status'
    ];
    public function permission()
    {
        return $this->hasOne('App\Modles\Permission','role_id','role_id');
    }
}
