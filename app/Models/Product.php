<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_id','product_name','status', 'slug', 'description', 'category_id', 'image'
    ];
}
