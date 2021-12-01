<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorAvailability extends Model
{
    /**
     * Manual Association with instructor_availability Table in the Database
     */
    protected $table = 'instructor_availability';

    public $timestamps = false; // Disable Timestamps
}
