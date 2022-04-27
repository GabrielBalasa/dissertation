<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the orders table
class Order extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'order_id'; // Set the primary key in the table as order_id
    protected $table = 'orders';
    public $timestamps = false; // Remove created_at and updated_at columns from tables
    
    protected $fillable = [
        'stripe_id',
        'customer_email',
        'trainer_id',
        'subscription_tier',
        'price',
        'status',
        'date',
    ];
}
