<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $req)
    {
        $image = null;

        if ($req->hasFile('image')) {
            $image = time().'.'.$req->image->extension();
            $req->image->move(public_path('banners'), $image);
        }

        Banner::create([
            'title' => $req->title,
            'description' => $req->description,
            'image' => $image
        ]);

        return redirect('/admin/banner');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $req, $id)
    {
        $banner = Banner::findOrFail($id);

        $image = $banner->image;

        if ($req->hasFile('image')) {
            $image = time().'.'.$req->image->extension();
            $req->image->move(public_path('banners'), $image);
        }

        $banner->update([
            'title' => $req->title,
            'description' => $req->description,
            'image' => $image
        ]);

        return redirect('/admin/banner');
    }

    public function delete($id)
    {
        Banner::findOrFail($id)->delete();
        return back();
    }
}
