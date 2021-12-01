<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /**
     * Manual Association with user_types Table in the Database
     */
    protected $table = 'user_types';

    public $timestamps = false; // Disable Timestamps

    public static function typeId($type)
    {
        return static::where('type', $type)->first()->id;
    }

    // Function to return the user Type
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
