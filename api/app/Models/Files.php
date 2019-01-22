<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    //
    protected $primaryKey = 'fileId';

    protected $table = "files";

    protected $fillable = [
        'fileId','filePath','fileName','mimeType','fileSize','isLocale'
    ];
    
}
