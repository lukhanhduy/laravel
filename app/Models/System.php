<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    //
    protected $table = "systems";
    
    protected $primaryKey = 'field_id';
    
    protected $fillable = [
        'field_id','field_name','field_data'
    ];
}
