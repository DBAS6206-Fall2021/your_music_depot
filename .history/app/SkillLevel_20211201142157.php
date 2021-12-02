<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillLevel extends Model
{
    // Properties
    
    /**
     * Manual Association with skill_levels Table in the Database
     */
    protected $table = 'skill_levels';
    public $timestamps = false; // Disable Timestamps


    // Relationships

    // A skill level could describe a number of different 
    //-instrument skill levels
    public function instrumentSkills()
    {
        return $this->hasMany(InstrumentSkill::class);
    }

    // A skill level could describe a number of different 
    //-instrument skill levels
    public function musicPieces()
    {
        return $this->hasMany(MusicPiece::class);
    }

    // Functions



}
