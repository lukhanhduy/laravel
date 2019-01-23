<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    //
    protected $primaryKey = 'fileId';
    
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $table = "files";

    protected $fillable = [
        'fileId','filePath','fileName','mimeType','fileSize','isLocale'
    ];
    
}
