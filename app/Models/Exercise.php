<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the exercises table
class Exercise extends Model
{
    use HasFactory;
    
    protected $table = 'exercises';
    public $timestamps = false; // Remove created_at and updated_at columns from tables
    protected $primaryKey = 'exercise_id'; // Set primary key in the table as exercise_id
    
    protected $fillable = [
        'trainer_id',
        'exercise_title',
        'exercise_description',
        'link',
        'sets',
        'reps',
    ];
}