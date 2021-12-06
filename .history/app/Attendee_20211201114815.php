<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    /**
     * Manual Association with attendees Table in the Database
     */
    protected $table = 'attendees';

    public $timestamps = false; // Disable Timestamps
}
