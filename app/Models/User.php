<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = true;
    protected $fillable = ['name', 'email', 'password', 'role', 'registration_date', 'login', 'updated_at', 'created_at'];

}
