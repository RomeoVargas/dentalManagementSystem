<?php

namespace App\Models;

use App\Services\UserService;

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
        'image_url',
    ];

    /**
     * To disable usage of date_created and date_last_modified in queries
     *
     * @var bool
     */
    public $timestamps = false;

    public function getUser()
    {
        return $this->belongsTo(User::class, 'id')->getResults();
    }

    public function getBranch()
    {
        return $this->belongsTo(Branch::class, 'branch_id')->getResults();
    }

    public function getImage()
    {
        $imageUrl = UserService::UPLOAD_URI.'/staff/'.$this->image_url;

        if (!file_exists($imageUrl)) {
            $imageUrl = UserService::NO_AVATAR_URI;
        }

        return asset($imageUrl);
    }
}
