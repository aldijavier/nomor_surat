<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $table = 'docs';

    protected $fillable = [
        'requestor', 'doc_type', 'req_date', 'department', 'nomor',
        'no_surat','notes'
    ];
}
