<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonNote extends Model
{
    // Properties
    
    /**
     * Manual Association with lesson_notes Table in the Database
     */
    protected $table = 'lesson_notes';


    // Relationships
    public function lessonInstructor()
    {
        return $this->belongsTo(LessonInstructor::class);
    }



    // Functions



}
