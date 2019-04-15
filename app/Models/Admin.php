<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admins";

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id','first_name', 'last_name', 'email', 'password', 'role_id', 'phone_number'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne('App\Modles\Role','role_id','role_id');
    }
    public function permission()
    {
        return $this->hasOne('App\Modles\Permission','role_id','role_id');
    }
}
