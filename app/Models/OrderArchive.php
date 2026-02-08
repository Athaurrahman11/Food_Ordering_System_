<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderArchive extends Model
{
    protected $fillable = [
        'original_order_id',
        'customer_name',
        'price',
        'delivered_at',
    ];

    protected $casts = [
        'delivered_at' => 'datetime',
    ];
}
