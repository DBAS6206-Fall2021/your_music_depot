<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // Properties
    
    /**
     * Manual Association with rooms Table in the Database
     */
    protected $table = 'rooms';
    public $timestamps = false; // Disable Timestamps


    // Relationships

    // Each Room may be used my multiple lessons
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // Each room has 1 room type
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    // Functions



}
