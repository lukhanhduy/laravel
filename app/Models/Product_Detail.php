<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Details extends Model
{
    //
    protected $table = "product_details";

    protected $primaryKey = 'field_id';

    protected $fillable = [
        'product_id','field_id','field_value', 'field_type', 'status'
    ];
}
