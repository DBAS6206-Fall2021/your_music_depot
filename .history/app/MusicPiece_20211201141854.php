<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicPiece extends Model
{
    // Properties
    
    /**
     * Manual Association with music_pieces Table in the Database
     */
    protected $table = 'music_pieces';
    public $timestamps = false; // Disable Timestamps


    // Relationships
    
    // Each music piece is performed by a Student
    public function Student()
    {
        return $this->belongsTo(Student::class);
    }

    // Each music piece is performed at a certain skill level
    public function lesson()
    {
        return $this->belongsTo(SkillLevel::class);
    }


    // Functions



}
