<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $primaryKey = 'moduleId';
    
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $table = "modules";

    protected $fillable = [
        'moduleId','moduleName','slug','fileId','index','parentId'
    ];
    
}
