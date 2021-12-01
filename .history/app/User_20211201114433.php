<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type_id', 'first_name', 'last_name', 'email', 'password', 'phone_number',
        'address', 'birth_date', 'last_access'
    ];

    /**
     * Manual Association with Users Table in the Database
     */
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
        return $this->belongsTo(UserType::class);
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
