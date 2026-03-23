<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('vendor.category.index', compact('categories'));
    }

    public function create()
    {
        return view('vendor.category.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $req->name,
            'slug' => Str::slug($req->name)
        ]);

        return redirect('/vendor/category');
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
            'slug' => Str::slug($req->name)
        ]);

        return redirect('/vendor/category');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        return back();
    }
}
