<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the messages table
class Message extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'message_id'; // Set the primary key in the table as message_id
    protected $table = 'messages';
    public $timestamps = false; // Remove created_at and updated_at columns from tables
    
    protected $fillable = [
        'user_id',
        'trainer_id',
        'message',
        'date',
        'sent_by',
    ];
}
