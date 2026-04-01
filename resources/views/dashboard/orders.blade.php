@extends('dashboard.layouts.app')

@section('content')

<div class="max-w-5xl">

    <!-- Title -->
    <h2 class="text-2xl font-semibold mb-8 flex items-center gap-2">
        💰 Marketplace
        <span class="text-yellow-500">Orders</span>
    </h2>

    {{-- EMPTY STATE --}}
    @if($orders->count() == 0)

        <div class="bg-white p-10 rounded-xl shadow text-center">
            <h3 class="text-lg font-semibold mb-2">No Orders Found</h3>
            <p class="text-gray-500 mb-4">You haven’t placed any order yet</p>

            <a href="/products"
               class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
               Browse Products
            </a>
        </div>

    @else

    <div class="space-y-6">

        @foreach($orders as $order)

        @php
            $status = $order->status ?? 'pending';
        @endphp

        <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

            <!-- LEFT -->
            <div>
                <h3 class="font-semibold text-lg">
                    Order #{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}
                </h3>

                <p class="text-gray-500 text-sm">
                    {{ $order->created_at->format('d M Y') }}
                </p>
            </div>

            <!-- RIGHT -->
            <div class="text-right">

                <p class="font-semibold text-lg text-green-600">
                    £{{ number_format($order->total ?? $order->total_price, 2) }}
                </p>

                {{-- STATUS --}}
                @if($status == 'completed')
                    <span class="text-green-600 text-sm font-medium">
                        Delivered
                    </span>
                @elseif($status == 'cancelled')
                    <span class="text-red-500 text-sm font-medium">
                        Cancelled
                    </span>
                @else
                    <span class="text-yellow-500 text-sm font-medium">
                        Pending
                    </span>
                @endif

                <!-- BUTTON -->
                <div class="mt-2">
                    <a href="/orders/{{ $order->id }}"
                       class="text-blue-600 text-sm font-medium hover:underline">
                        View Details →
                    </a>
                </div>

            </div>

        </div>

        @endforeach

    </div>

    @endif

</div>

@endsection