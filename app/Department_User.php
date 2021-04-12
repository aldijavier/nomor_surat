<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department_User extends Model
{
    //
    
    protected $table = 'department_user';

    protected $fillable = [
        'department_id', 'user_id'
    ];
}
