<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $primaryKey = 'category_id';

    protected $table = "categories";

    protected $fillable = [
        'category_id','category_name','parent_id','slug','file_id','index'
    ];
}
