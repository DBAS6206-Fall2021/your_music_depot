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
}
