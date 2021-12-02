<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstrumentSkill extends Model
{
    // Properties

    /**
     * Manual Association with instrument_skills Table in the Database
     */
    protected $table = 'instrument_skills';
    public $timestamps = false; // Disable Timestamps

    // Relationships

    // Each Instrument Skill, as one skill level
    public function instrument()
    {
        return $this->hasOne(Instrument::class);
    }

    // Each Instrument Skill, indicates a single student
    public function student()
    {
        return $this->hasOne(Student::class);
    }
    
    // Functions



}
