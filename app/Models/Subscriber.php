<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the subscribers table
class Subscriber extends Model
{
    use HasFactory;
    
    protected $table = 'subscribers';
    public $timestamps = false; // Remove created_at and updated_at columns from tables
    
    protected $fillable = [
        'user_id',
        'trainer_id',
        'subscription_tier',
    ];
    
    public function trainer() { // Connect the subscribers table to the users table to return the user with the role "trainer" assigned in the entry
        return $this->hasOne('App\Models\User', 'id', 'trainer_id');
    }
    
    public function subscription() { // Connect the subscribers table to the subscriptions table
        return $this->hasOne('App\Models\Subscription', 'trainer_id', 'trainer_id');
    }
    
    public function user() { // Connect the subscribers table to the users table to return the user with the role "user" assigned in the entry
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
