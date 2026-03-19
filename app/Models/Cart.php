<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Cart extends Model
{
    use HasFactory;

    // ✅ यही जरूरी है
    protected $fillable = [
        'user_id',
        'type',
        'item_id',
        'qty'
    ];

    public function training()
{
    return $this->belongsTo(\App\Models\Product::class, 'item_id');
}

public function course()
{
    return $this->belongsTo(\App\Models\Course::class, 'item_id');
}
}

