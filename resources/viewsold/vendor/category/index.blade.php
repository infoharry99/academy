@extends('vendor.layout')

@section('page_title', 'Category')

@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
    <h2 style="font-size:1.5rem;font-weight:600">All Categories</h2>

    <a href="/vendor/category/create"
       style="background:#16a34a;color:#fff;padding:8px 14px;border-radius:8px;text-decoration:none">
        + Add Category
    </a>
</div>

<div style="background:#fff;border:1px solid #d0e2f7;border-radius:12px;overflow:hidden">

<table style="width:100%;border-collapse:collapse">

    <thead style="background:#f0f6ff">
        <tr>
            <th style="padding:12px;text-align:left">#</th>
            <th style="padding:12px;text-align:left">Name</th>
            <th style="padding:12px;text-align:left">Slug</th>
            <th style="padding:12px;text-align:left">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $key => $cat)
        <tr style="border-top:1px solid #e2e8f0">
            <td style="padding:12px">{{ $key+1 }}</td>
            <td style="padding:12px">{{ $cat->name }}</td>
            <td style="padding:12px">{{ $cat->slug }}</td>
            <td style="padding:12px">

                <a href="/vendor/category/edit/{{ $cat->id }}"
                   style="color:#1a6fd4;margin-right:10px">Edit</a>

                <a href="/vendor/category/delete/{{ $cat->id }}"
                   onclick="return confirm('Delete this category?')"
                   style="color:#dc2626">Delete</a>

            </td>
        </tr>
        @endforeach
    </tbody>

</table>

</div>

@endsection