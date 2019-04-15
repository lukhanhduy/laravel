<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    //
    protected $primaryKey = 'file_id';

    protected $table = "files";

    protected $fillable = [
        'file_id','file_path','file_name','mime_type','file_size','is_locale'
    ];
    
}
