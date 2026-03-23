<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Course;
use App\Models\Category;
use App\Models\Banner;


class HomeController extends Controller
{
    public function index(Request $req)
    {
        $categories = Category::all();

        $selectedCategory = $req->category; // 👈 ADD

        $products = Product::with('category')
            ->when($selectedCategory, function ($q) use ($selectedCategory) {
                $q->where('category_id', $selectedCategory);
            })
            ->latest()
            ->take(6)
            ->get();

        $courses = Course::all();
        $banners = Banner::where('is_active',1)->get();

        return view('home', compact('products', 'courses', 'categories', 'selectedCategory', 'banners'));
    }


    // ✅ ALL PRODUCTS PAGE
    public function allProducts(Request $req)
    {
        $categories = Category::all();

        $products = Product::with('category')
            ->when($req->category, function ($q) use ($req) {
                $q->where('category_id', $req->category);
            })
            ->latest()
            ->paginate(9);

        return view('products', compact('products', 'categories'));
    }

   public function productDetail($id)
{
    $product = Product::with('category')->findOrFail($id);

    // 🔥 RELATED PRODUCTS
    $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->latest()
        ->take(4)
        ->get();

    return view('product-detail', compact('product', 'relatedProducts'));
}

    public function courseDetail($id)
    {
        $course = Course::findOrFail($id);
        return view('course-detail', compact('course'));
    }
}