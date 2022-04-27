<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the contacts table
class ContactUs extends Model
{
    use HasFactory;
    
    protected $table = 'contacts';
    protected $primaryKey = 'contact_id'; // Set primary key in the table as contact_id
    public $timestamps = false; // Remove created_at and updated_at columns from tables
    
    protected $fillable = [
        'contact_name',
        'contact_email',
        'contact_message',
    ];
}
