<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the workouts table
class Workout extends Model
{
    use HasFactory;
    
    protected $table = 'workouts';
    public $timestamps = false; // Remove created_at and updated_at columns from tables
    
    protected $primaryKey = 'workout_id'; // Set primary key as workout_id
    
    protected $fillable = [
        'trainer_id',
        'workout_title',
    ];
}
