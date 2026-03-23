<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'price',
    'description',
    'vendor_id',
    'image',
    'category_id'
];

// relation
public function category()
{
    return $this->belongsTo(Category::class);
}
}
