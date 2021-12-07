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

    public function hasStartTimeAvailability($time)
    {
        return $this->where('start_availability', $time)->count() > 0;
    }

    public function hasEndTimeAvailability($time)
    {
        return $this->where('end_availability', $time)->count() > 0;
    }

    public function hasAvailability($weekday, $time)
    {
        return $this->hasWeekdayAvailability($weekday) && $this->hasStartTimeAvailability($time);
    }
    
}
