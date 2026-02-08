<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_name',
        'status',
        'price',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function food()
    {
        return $this->belongsToMany(Food::class, 'order_items')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
