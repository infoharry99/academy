@extends('layouts.app')

@section('content')

<div style="max-width:900px;margin:auto;padding:2rem">

    <h1 style="font-size:2rem;font-weight:700">
        {{ $course->title }}
    </h1>

    <p style="margin:1rem 0;color:#666">
        {{ $course->description }}
    </p>

    <div style="font-size:1.8rem;color:#3b82f6;font-weight:600">
        ₹{{ $course->price }}
    </div>

    <a href="{{ url('/cart/add/course/'.$course->id) }}"
       style="display:inline-block;margin-top:20px;padding:12px 24px;background:#3b82f6;color:#fff;border-radius:10px;text-decoration:none">
       Add to Cart
    </a>

</div>

@endsection