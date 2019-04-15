<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $primaryKey = 'module_id';

    protected $table = "modules";

    protected $fillable = [
        'module_id','module_name','slug','file_id','index','parent_id'
    ];
    
}
