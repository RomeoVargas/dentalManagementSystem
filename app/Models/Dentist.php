<?php

namespace App\Models;

class Dentist extends AppModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'branch_id',
        'introduction',
    ];
}
