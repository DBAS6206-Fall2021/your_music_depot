<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Function to return the user Type
    public function userType()
    {
        return $this->belongsTo(UserType::class, 'id');
    }

    public function type()
    {
        return $this->userType->type;
    }

    // Function to return the user Type
    public function isManagement()
    {
        return $this->type() === 'M';
    }
}
