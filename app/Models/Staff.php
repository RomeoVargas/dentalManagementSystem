<?php

namespace App\Models;

class Staff extends AppModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'branch_id',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'id')->getResults();
    }
}
