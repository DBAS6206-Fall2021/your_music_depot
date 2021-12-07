<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorAvailability extends Model
{
    // Properties
    /**
     * Manual Association with instructor_availability Table in the Database
     */
    protected $table = 'instructor_availability';
    public $timestamps = false; // Disable Timestamps

    // Relationships

    // An Availability belongs to a User (Instructor)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Functions

    public function hasWeekdayAvailability($weekday)
    {
        return $this->where('weekday', $weekday)->count() > 0;
    }
    
}
