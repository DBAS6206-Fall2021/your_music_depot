<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    /**
     * Manual Association with instruments Table in the Database
     */
    protected $table = 'instruments';

    public $timestamps = false;
}
