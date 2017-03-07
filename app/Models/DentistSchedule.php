<?php

namespace App\Models;

use App\Services\UserService;

class DentistSchedule extends AppModel
{
    const DAYS = array(
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dentist_id',
        'days',
        'time_start',
        'time_end',
    ];

    /**
     * To disable usage of date_created and date_last_modified in queries
     *
     * @var bool
     */
    public $timestamps = false;

    public function getDentist()
    {
        return $this->belongsTo(Dentist::class, 'dentist_id')->getResults();
    }
}
