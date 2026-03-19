@extends('layouts.app')

@section('content')

<div style="max-width:900px;margin:auto;padding:2rem">

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:2rem">

        <!-- IMAGE -->
        <div>
            @if($product->image)
                <img src="{{ asset('products/'.$product->image) }}"
                     style="width:100%;border-radius:16px">
            @else
                <div style="height:300px;background:#eee;border-radius:16px"></div>
            @endif
        </div>

        <!-- DETAILS -->
        <div>

            <h1 style="font-size:2rem;font-weight:700">
                {{ $product->title }}
            </h1>

            <p style="margin:1rem 0;color:#666">
                {{ $product->description }}
            </p>

            <!-- PRICE -->
            <div style="font-size:1.8rem;color:green;font-weight:600">
                ₹{{ $product->price }}
            </div>

            @if($product->sale_price)
                <div style="color:red">
                    Sale Price: ₹{{ $product->sale_price }}
                </div>
            @endif

            <!-- STOCK -->
            <div style="margin-top:10px">
                Stock:
                <strong style="color:{{ $product->stock > 0 ? 'green' : 'red' }}">
                    {{ $product->stock > 0 ? 'Available' : 'Out of Stock' }}
                </strong>
            </div>

            <!-- BUTTON -->
            <a href="{{ url('/cart/add/training/'.$product->id) }}"
               style="display:inline-block;margin-top:20px;padding:12px 24px;background:#16a34a;color:#fff;border-radius:10px;text-decoration:none">
               Add to Cart
            </a>

        </div>

    </div>

</div>

@endsection