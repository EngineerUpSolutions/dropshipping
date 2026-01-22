<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'total_amount',
        'user_id',
    ];
    
    protected $keyType = 'string';
    public $incrementing = false;
}




