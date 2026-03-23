<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Category;

class ProductController extends Controller
{
 public function index()
{
    // $products = Product::where('vendor_id', Session::get('vendor_id'))->get();
    $products = Product::with('category')
    ->where('vendor_id', Session::get('vendor_id'))
    ->get();
    return view('vendor.training.index', compact('products'));
}
public function create()
{
    $categories = Category::where('type','product')->get();
    return view('vendor.training.create', compact('categories'));
}
public function store(Request $req)
{
    $req->validate([
        'title' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'category_id' => 'required' ,
    ]);

    $image = null;

    if ($req->hasFile('image')) {
        $image = time().'.'.$req->image->extension();
        $req->image->move(public_path('products'), $image);
    }

    Product::create([
        'title' => $req->title,
        'slug' => Str::slug($req->title),
        'description' => $req->description,
        'price' => $req->price,
        'sale_price' => $req->sale_price,
        'stock' => $req->stock,
        'sku' => $req->sku,
        'category_id' => $req->category_id, // 👈 ADD THIS
        'image' => $image,
        'vendor_id' => Session::get('vendor_id'),
        'is_active' => $req->is_active ?? 1,
        'is_featured' => $req->is_featured ?? 0,
    ]);

    return redirect('/vendor/training');
}
public function edit($id)
{
    $product = Product::findOrFail($id);

    $categories = Category::where('type','product')->get();


    return view('vendor.training.edit', compact('product','categories'));
}
public function update(Request $req, $id)
{
    $req->validate([
    'category_id' => 'required|exists:categories,id'
]);
    $product = Product::findOrFail($id);

    $image = $product->image;

    if ($req->hasFile('image')) {
        $image = time().'.'.$req->image->extension();
        $req->image->move(public_path('products'), $image);
    }

    $product->update([
        'title' => $req->title,
        'slug' => Str::slug($req->title),
        'description' => $req->description,
        'price' => $req->price,
        'sale_price' => $req->sale_price,
        'stock' => $req->stock,
        'sku' => $req->sku,
         'category_id' => $req->category_id, // 👈 ADD THIS
        'image' => $image,
        'is_active' => $req->is_active ?? 1,
        'is_featured' => $req->is_featured ?? 0,
    ]);

    return redirect('/vendor/training');
}
public function delete($id)
{
    Product::find($id)->delete();
    return back();
}

}
