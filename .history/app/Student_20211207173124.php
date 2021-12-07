<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Properties
    
    /**
     * Manual Association with students Table in the Database
     */
    protected $table = 'students';
    public $timestamps = false; // Disable Timestamps


    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Lessons()
    {
        return $this->belongsToMany(Lesson::class, Attendee::class);
    }

    public function musicPieces()
    {
        return $this->hasMany(MusicPiece::class);
    }

    public function instrumentSkills()
    {
        return $this->hasMany(InstrumentSkill::class);
    }



    // Functions



}
