<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the qualifications table
class Qualification extends Model
{
    use HasFactory;
    
    protected $table = 'qualifications';
    protected $primaryKey = 'qualification_id'; // Set the primary key for the table as qualification_id
    public $timestamps = false; // Remove created_at and updated_at columns from tables
    
    protected $fillable = [
        'trainer_id',
        'qualification_title',
    ];
}
