<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Course;
use App\Models\Category;
use App\Models\Banner;


class HomeController extends Controller
{
    public function index(Request $req,$id = null)
    {
        if ($id) {
            session(['vendor_id' => $id]);
        }

        $vendorId = session('vendor_id');

        $productCategories = Category::where('type','product')->get();
        $courseCategories = Category::where('type','course')->get();

        $selectedProductCat = $req->product_category;
        $selectedCourseCat = $req->course_category;

        // 🔥 PRODUCTS FILTER
        $products = Product::with('category')
                    ->when($vendorId, function ($q) use ($vendorId) {
                        $q->where('vendor_id', $vendorId);
                    })
                    ->when($selectedProductCat, function ($q) use ($selectedProductCat) {
                        $q->where('category_id', $selectedProductCat);
                    })
                    ->latest()
                    ->take(6)
                    ->get();

        // 🔥 COURSES FILTER
        $courses = Course::with('category')
                    ->when($vendorId, function ($q) use ($vendorId) {
                        $q->where('vendor_id', $vendorId);
                    })
                    ->when($selectedCourseCat, function ($q) use ($selectedCourseCat) {
                        $q->where('category_id', $selectedCourseCat);
                    })
                    ->latest()
                    ->take(6)
                    ->get();

        $banners = Banner::where('is_active',1)->get();

        return view('home', compact(
            'products',
            'courses',
            'productCategories',
            'courseCategories',
            'selectedProductCat',
            'selectedCourseCat',
            'banners'
        ));
    }

    // ✅ ALL PRODUCTS PAGE
    public function allProducts(Request $req)
    {
        $vendorId = session('vendor_id');

        $categories = Category::where('type','product')->get();

        $products = Product::with('category')
            ->when($vendorId, function ($q) use ($vendorId) {
                $q->where('vendor_id', $vendorId);
            })
            ->when($req->category, function ($q) use ($req) {
                $q->where('category_id', $req->category);
            })
            ->latest()
            ->paginate(9);

        return view('products', compact('products', 'categories'));
    }

   public function allCourses(Request $req)
    {
        $vendorId = session('vendor_id');

        $categories = Category::where('type','course')->get();

        $courses = Course::with('category')
            ->when($vendorId, function ($q) use ($vendorId) {
                $q->where('vendor_id', $vendorId);
            })
            ->when($req->category, function ($q) use ($req) {
                $q->where('category_id', $req->category);
            })
            ->latest()
            ->paginate(9);

        return view('courses', compact('courses','categories'));
    }

    public function productDetail($id)
    {
        $vendorId = session('vendor_id');

        $product = Product::with('category')
            ->when($vendorId, function ($q) use ($vendorId) {
                $q->where('vendor_id', $vendorId);
            })
            ->findOrFail($id);

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->when($vendorId, function ($q) use ($vendorId) {
                $q->where('vendor_id', $vendorId);
            })
            ->latest()
            ->take(4)
            ->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }
    
    public function courseDetail($id)
    {
        $vendorId = session('vendor_id');

        $course = Course::when($vendorId, function ($q) use ($vendorId) {
            $q->where('vendor_id', $vendorId);
        })->findOrFail($id);

        return view('course-detail', compact('course'));
    }
}