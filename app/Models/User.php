<?php

namespace App\Models;

class User extends AppModel
{
    const AUTH_TYPE_PATIENT = 0;
    const AUTH_TYPE_DOCTOR  = 200;
    const AUTH_TYPE_STAFF   = 201;
    const AUTH_TYPE_ADMIN   = 500;

    const MAX_LENGTH_EMAIL = 50;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auth_type',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
