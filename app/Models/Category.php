<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $primaryKey = 'categoryId';
    
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $table = "categories";

    protected $fillable = [
        'categoryId','categoryName','parentId','slug','fileId','index'
    ];
}
