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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'weekday', 'start_availability', 'end_availability'
    ];

    // Relationships

    // An Availability belongs to a User (Instructor)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Functions

    public function hasStartAvailability($time)
    {
        return $this->where('start_availability', $time)->count() > 0;
    }

    public function hasEndAvailability($time)
    {
        return $this->where('end_availability', $time)->count() > 0;
    }

}
