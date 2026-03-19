<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Course;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'total'
];
public function items()
{
    return $this->hasMany(OrderItem::class);
}
public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}
}
