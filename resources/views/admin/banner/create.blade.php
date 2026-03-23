@extends('admin.layout')

@section('page_title', 'Add Banner')

@section('content')

<div class="max-w-xl mx-auto bg-white text-gray-700 p-6 rounded-xl shadow">

    <h2 class="text-lg font-semibold mb-4">Add New Banner</h2>

    <form method="POST" action="/admin/banner/store" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Title</label>
            <input type="text" name="title"
                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description"
                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Banner Image</label>
            <input type="file" name="image"
                class="w-full border rounded-lg px-3 py-2">
        </div>

        <!-- Button -->
        <button
            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Save Banner
        </button>

    </form>

</div>

@endsection