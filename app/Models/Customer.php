<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [

        'name',
        'phone',
        'email',
        'password',

    ];

    protected $hidden = [

        'password',
        'remember_token',

    ];
}