<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonInstructor extends Model
{
    // Properties
    
    /**
     * Manual Association with lesson_instructors Table in the Database
     */
    protected $table = 'lesson_instructors';
    public $timestamps = false; // Disable Timestamps

    protected $fillable = ['user_id', 'user_id'];

    // Relationships

    // Each lesson Instructor is a single User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Each lesson Instructor teaches a single lesson
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    // Each lesson Instructor has zero or more Less Notes
    public function lessonNotes()
    {
        return $this->hasMany(LessonNotes::class);
    }

    // Functions

    
}
