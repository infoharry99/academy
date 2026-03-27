@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-6 grid grid-cols-12 gap-6">

    <!-- SIDEBAR -->
    <div class="col-span-3">

        <div class="bg-white rounded-xl shadow p-4">

            <h2 class="font-semibold mb-3">Categories</h2>

            <a href="/all-products"
               class="block px-3 py-2 rounded-lg mb-1
               {{ request('category') ? 'text-gray-600' : 'bg-blue-600 text-white' }}">
                All
            </a>

            @foreach($categories as $cat)
                <a href="/all-products?category={{ $cat->id }}"
                   class="block px-3 py-2 rounded-lg mb-1
                   {{ request('category') == $cat->id ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    {{ $cat->name }}
                </a>
            @endforeach

        </div>

    </div>

    <!-- PRODUCTS -->
    <div class="col-span-9">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($products as $p)
            <div class="card">
                    <div class="card-media" style="background:linear-gradient(135deg,#0a0f1f,#101828)">

                        @if($p->image)
                            <img src="{{ asset('products/' . $p->image) }}" class="w-full h-full object-cover rounded-t-lg">
                        @else
                            <div class="flex items-center justify-center h-full text-white">
                                📚
                            </div>
                        @endif

                        <span class="card-media-tag tag-training">{{ $p->category->name ?? 'No Category' }}</span>
                    </div>

                    <div class="card-body">
                        <div class="card-title">{{ $p->title }}</div>

                        <div class="card-desc">
                            {{ Str::limit($p->description, 100) }}
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="price price-green">£{{ $p->price }}</div>

                        @if(auth()->check())
                            <a href="{{ url('/cart/add/training/' . $p->id) }}" class="add-btn add-green">
                                + Add cart
                            </a>
                        @else
                            <a href="/login" class="add-btn add-green">
                                + Add cart
                            </a>
                        @endif
                        <a href="{{ url('product/' . $p->id) }}" class="add-btn add-green">
                            + View
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- PAGINATION -->
        <div class="mt-6">
            {{ $products->links() }}
        </div>

    </div>

</div>

@endsection