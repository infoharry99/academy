<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductController extends Controller
{
 public function index()
{
    $products = Product::where('vendor_id', Session::get('vendor_id'))->get();
    return view('vendor.training.index', compact('products'));
}

// CREATE PAGE
public function create()
{
    return view('vendor.training.create');
}

// STORE

public function store(Request $req)
{
    $req->validate([
        'title' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
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
        'image' => $image,
        'vendor_id' => Session::get('vendor_id'),
        'is_active' => $req->is_active ?? 1,
        'is_featured' => $req->is_featured ?? 0,
    ]);

    return redirect('/vendor/training');
}

// EDIT PAGE
public function edit($id)
{
    $product = Product::find($id);
    return view('vendor.training.edit', compact('product'));
}

// UPDATE
public function update(Request $req, $id)
{
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
        'image' => $image,
        'is_active' => $req->is_active ?? 1,
        'is_featured' => $req->is_featured ?? 0,
    ]);

    return redirect('/vendor/training');
}

// DELETE
public function delete($id)
{
    Product::find($id)->delete();
    return back();
}
}
