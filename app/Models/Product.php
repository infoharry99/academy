<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
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
     'category_id', 
    'is_active',
    'is_featured'
];
public function category()
{
    return $this->belongsTo(Category::class);
}
}