<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    // Properties

    /**
     * Manual Association with instruments Table in the Database
     */
    protected $table = 'instruments';
    public $timestamps = false; // Disable Timestamps

    // Relationships

    // An Instrument can be used in many different Lessons
    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    // Functions


    
}
