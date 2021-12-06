<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstrumentSkill extends Model
{
    /**
     * Manual Association with instrument_skills Table in the Database
     */
    protected $table = 'instrument_skills';
    public $timestamps = false;
}