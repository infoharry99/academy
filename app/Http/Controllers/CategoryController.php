<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
  public function index(Request $req)
{
    $type = $req->type;

    $categories = Category::when($type, function($q) use ($type){
        $q->where('type',$type);
    })->latest()->get();

    return view('vendor.category.index', compact('categories'));
}

   public function create(Request $req)
{
    $type = $req->type ?? (session('vendor_type') == 'training' ? 'product' : 'course');

    return view('vendor.category.create', compact('type'));
}

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            
        ]);

        Category::create([
            'name' => $req->name,
            'slug' => Str::slug($req->name),
             'type' => session('vendor_type') == 'training' ? 'product' : 'course'
        ]);

    return redirect('/vendor/category?type='.(session('vendor_type') == 'training' ? 'product' : 'course'));

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        
        return view('vendor.category.edit', compact('category'));
    }

    public function update(Request $req, $id)
{
    $category = Category::findOrFail($id);

    $category->update([
        'name' => $req->name,
        'slug' => Str::slug($req->name),
        'type' => session('vendor_type') == 'training' ? 'product' : 'course'
    ]);

    return redirect('/vendor/category?type='.(session('vendor_type') == 'training' ? 'product' : 'course'));
}

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        return back();
    }
}
