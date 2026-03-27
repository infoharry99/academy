@extends('admin.layout')

@section('page_title', 'Edit Banner')

@section('content')

<div class="max-w-xl mx-auto bg-white text-gray-700 p-6 rounded-xl shadow">

    <h2 class="text-lg font-semibold mb-4">Edit Banner</h2>

    <form method="POST" action="/admin/banner/update/{{ $banner->id }}" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Title</label>
            <input type="text" name="title" value="{{ $banner->title }}"
                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description"
                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none">{{ $banner->description }}</textarea>
        </div>

        <!-- Current Image -->
        <div class="mb-4">
            <p class="text-sm mb-2">Current Image:</p>
            <img src="/banners/{{ $banner->image }}"
                 class="w-full h-40 object-cover rounded-lg">
        </div>

        <!-- New Image -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Change Image</label>
            <input type="file" name="image"
                class="w-full border rounded-lg px-3 py-2">
        </div>

        <!-- Button -->
        <button
            class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
            Update Banner
        </button>

    </form>

</div>

@endsection