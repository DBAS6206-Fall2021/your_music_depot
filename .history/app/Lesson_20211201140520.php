<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    // Properties
    
    /**
     * Manual Association with lessons Table in the Database
     */
    protected $table = 'lessons';

    // Relationships

    // Each lesson has one or more attendants
    public function attendee()
    {
        return $this->hasMany(Lesson::class);
    }

    // Each lesson has one or more instructors
    public function lessonInstructor()
    {
        return $this->hasMany(Lesson::class);
    }

    // Each lesson is of a single type
    public function lessonType()
    {
        return $this->hasMany(Lesson::class);
    }

    // Each lesson teaches a single instrument
    public function instrument()
    {
        return $this->hasMany(Lesson::class);
    }

    // Each lesson occurs inside a single room
    public function room()
    {
        return $this->hasMany(Lesson::class);
    }

    // Functions


}
