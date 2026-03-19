<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // ✅ यही missing था 🔥
   protected $fillable = [
    'title',
    'slug',
    'description',
    'price',
    'sale_price',
    'stock',
    'sku',
    'image',
    'vendor_id',
    'is_active',
    'is_featured'
];
}