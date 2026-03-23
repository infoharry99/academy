@extends('vendor.layout')

@section('page_title', 'Edit Category')

@section('content')

<div style="max-width:500px">

<form method="POST" action="/vendor/category/update/{{ $category->id }}">
@csrf

<div style="margin-bottom:1rem">
    <label>Name</label>
    <input type="text" name="name"
        value="{{ $category->name }}"
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:8px">
</div>

<button type="submit"
    style="background:#1a6fd4;color:#fff;padding:10px 15px;border:none;border-radius:8px">
    Update Category
</button>

</form>

</div>

@endsection