<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonType extends Model
{
    // Properties
    
    /**
     * Manual Association with lesson_types Table in the Database
     */
    protected $table = 'lesson_types';
    public $timestamps = false; // Disable Timestamps


    // Relationships

    // A lesson type may be used in several lessons
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }


    // Functions



}
