<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    // Properties
    
    /**
     * Manual Association with room_types Table in the Database
     */
    protected $table = 'room_types';
    public $timestamps = false; // Disable Timestamps


    // Relationships

    // Each room type may indicate several rooms
    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }


    // Functions



}
