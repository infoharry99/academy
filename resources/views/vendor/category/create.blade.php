@extends('vendor.layout')

@section('page_title', 'Add Category')

@section('content')

<div style="max-width:500px">

<form method="POST" action="/vendor/category/store">
@csrf

<div style="margin-bottom:1rem">
    <label>Name</label>
    <input type="text" name="name"
        style="width:100%;padding:10px;border:1px solid #ccc;border-radius:8px">
</div>

<button type="submit"
    style="background:#16a34a;color:#fff;padding:10px 15px;border:none;border-radius:8px">
    Save Category
</button>

</form>

</div>

@endsection