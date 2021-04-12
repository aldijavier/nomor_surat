<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentUser extends Model
{
    //
    protected $table = 'department_user';

    protected $fillable = [
        'user_id',  'department_id' 
    ];
}
