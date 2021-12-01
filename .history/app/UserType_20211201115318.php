<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    // Properties
    /**
     * Manual Association with user_types Table in the Database
     */
    protected $table = 'user_types';

    public $timestamps = false; // Disable Timestamps

    
    // Relationships
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Functions 

    public static function typeId($type)
    {
        return static::where('type', $type)->first()->id;
    }
}
