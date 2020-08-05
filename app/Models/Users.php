<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Users extends User
{
    //
    protected $fillable = [
        'userName','password'
    ];

    protected $hidden = [
        'password'
    ];
}
