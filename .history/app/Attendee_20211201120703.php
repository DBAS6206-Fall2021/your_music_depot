<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    // Properties

    /**
     * Manual Association with attendees Table in the Database
     */
    protected $table = 'attendees';

    public $timestamps = false; // Disable Timestamps

    // Relationships

    // An attendee is apart of a lesson
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    // An Attendee is a student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }


    // Functions

}
