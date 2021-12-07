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

    public function hasAvailability($weekday, $time)
    {
        return $this->instructorAvailability()->where('weekday', 'Monday')->where('start_availability', '08:00:00')->count() > 0;
    }

}
