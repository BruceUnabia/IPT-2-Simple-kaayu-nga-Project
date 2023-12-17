<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarPurchase extends Model
{
    protected $fillable = [
        'user_id',
        'car_id',
        'purchase_date',
    ];

    // Define relationships if necessary
}

