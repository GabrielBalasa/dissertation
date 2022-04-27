<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the workouts_assignments table
class AssignWorkout extends Model
{
    use HasFactory;
    
    protected $table = 'workouts_assignments';
    public $timestamps = false; // Remove created_at and updated_at columns from tables
    
    protected $fillable = [
        'workout_id',
        'user_id',
        'workout_start_date',
        'workout_end_date',
    ];
    
    public function user() { // Connect the workouts_assignments table to users table
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    public function workout() { // Connect the workouts_assignments table to workouts table
        return $this->hasOne('App\Models\Workout', 'workout_id', 'workout_id');
    }
}
