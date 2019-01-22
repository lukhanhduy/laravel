<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $primaryKey = 'moduleId';

    protected $table = "modules";

    protected $fillable = [
        'moduleId','moduleName','Prefix'
    ];
    
}
