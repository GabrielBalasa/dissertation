<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// Model for the users table - create based on the tutorial under reference [8]
class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'address',
        'city',
        'postcode',
        'dob',
        'password',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    
    public function subscriptions() { // Connect the users table to the subscriptions table
        return $this->hasOne('App\Models\Subscription', 'trainer_id', 'id');
    }
    
    public function qualifications() { // Connect the users table to the qualifications table
        return $this->hasMany('App\Models\Qualification', 'trainer_id', 'id');
    }
}