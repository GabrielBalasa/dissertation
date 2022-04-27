<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the waiting_list table
class WaitingList extends Model
{
    use HasFactory;
    
    protected $table = 'waiting_list';
    public $timestamps = false; // Remove created_at and updated_at columns from tables
    
    protected $fillable = [
        'user_id',
        'applied_at',
    ];
    
    public function user() { // Connect the waiting_list table to the users table
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
