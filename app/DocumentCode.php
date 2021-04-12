<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentCode extends Model
{
    protected $table = 'document_codes';

    protected $fillable = [
        'name', 'code'
    ];
}
