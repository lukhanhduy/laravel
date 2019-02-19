<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    //
    protected $table = "systems";
    
    protected $primaryKey = 'fieldId';
    
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'fieldId','fieldName','fieldValue'
    ];
}
