<?php

namespace App\Models;

class Branch extends AppModel
{
    const MAX_LENGTH_NAME = 50;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
    ];
}
