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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Functions

    
}
