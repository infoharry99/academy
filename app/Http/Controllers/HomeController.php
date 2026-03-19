<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Course;


class HomeController extends Controller
{
    public function index()
{
    $products = Product::all();
    $courses = Course::all();

    return view('home', compact('products','courses'));
}

public function productDetail($id)
{
    $product = Product::findOrFail($id);
    return view('product-detail', compact('product'));
}

public function courseDetail($id)
{
    $course = Course::findOrFail($id);
    return view('course-detail', compact('course'));
}
}
