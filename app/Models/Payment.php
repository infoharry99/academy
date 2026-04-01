<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'transaction_id',
        'type',
        'amount',
        'method',
        'status'
    ];
    public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}

public function order()
{
    return $this->belongsTo(\App\Models\Order::class);
}
public function items()
{
    return $this->hasMany(\App\Models\OrderItem::class);
}
public function product()
{
    return $this->belongsTo(\App\Models\Product::class);
}

public function course()
{
    return $this->belongsTo(\App\Models\Course::class);
}
}
