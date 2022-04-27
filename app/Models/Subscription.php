<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the subscriptions table
class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscriptions';
    public $timestamps = false; // Remove created_at and updated_at columns from tables
    
    protected $fillable = [
        'trainer_id',
        'tier1_price',
        'tier1_description',
        'tier2_price',
        'tier2_description',
        'tier3_price',
        'tier3_description',
    ];
}
