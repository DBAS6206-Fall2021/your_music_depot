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

    protected $fillable = ['room_number', 'instrument_id', 'lesson_type_id', 'date', 'start_time', 'end_date'];

    // Each lesson has one or more attendants
    public function students()
    {
        return $this->belongsToMany(Student::class, Attendee::class);
    }

    // Each lesson has one or more instructors
    public function users()
    {
        return $this->belongsToMany(User::class, LessonInstructor::class);
    }

    // Each lesson is of a single type
    public function lessonType()
    {
        return $this->belongsTo(LessonType::class);
    }

    // Each lesson teaches a single instrument
    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }

    // Each lesson occurs inside a single room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Functions


}
