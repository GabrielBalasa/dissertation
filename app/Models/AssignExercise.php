<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the workouts_exercises table
class AssignExercise extends Model
{
    use HasFactory;
    
    protected $table = 'workouts_exercises';
    public $timestamps = false; // Remove created_at and updated_at columns from tables
    
    protected $fillable = [
        'exercise_id',
        'workout_id',
    ];
    
    public function workout() { // Connect the workouts_exercises table to workouts table
        return $this->hasOne('App\Models\Workout', 'workout_id', 'workout_id');
    }
    
    public function exercise() { // Connect the workouts_exercises table to exercises table
        return $this->hasOne('App\Models\Exercise', 'exercise_id', 'exercise_id');
    }
}
