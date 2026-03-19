@extends('layouts.app')

@section('content')

<div style="max-width:760px;margin:3rem auto;padding:0 1.5rem 6rem">

    {{-- Page title --}}
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:2rem;padding-bottom:1.25rem;border-bottom:1.5px solid #d0e2f7">
        <div style="width:44px;height:44px;border-radius:10px;background:#dbeafe;display:flex;align-items:center;justify-content:center;font-size:1.25rem">🛒</div>
        <div>
            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.9rem;letter-spacing:0.05em;color:#0d1f3c">My Cart</div>
            <div style="font-size:0.8rem;color:#8aaac8;font-weight:500">{{ count($cart) }} item(s) in your cart</div>
        </div>
    </div>

    @if(count($cart) === 0)

        {{-- Empty state --}}
        <div style="text-align:center;padding:4rem 2rem;background:#fff;border:1px solid #d0e2f7;border-radius:16px">
            <div style="font-size:3rem;margin-bottom:1rem">🛍️</div>
            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:0.05em;color:#0d1f3c;margin-bottom:0.5rem">Your cart is empty</div>
            <p style="color:#8aaac8;font-size:0.9rem;margin-bottom:1.5rem">Browse our trainings and courses to get started.</p>
            <a href="/"
               style="display:inline-flex;align-items:center;gap:6px;padding:10px 24px;border-radius:10px;background:#1a6fd4;color:#fff;font-size:0.9rem;font-weight:600;text-decoration:none"
            >Explore Programs →</a>
        </div>

    @else

        {{-- Cart items --}}
        <div style="display:flex;flex-direction:column;gap:10px;margin-bottom:1.5rem">
            @foreach($cart as $c)
            <div style="background:#fff;border:1px solid #d0e2f7;border-radius:14px;padding:1rem 1.25rem;display:flex;align-items:center;justify-content:space-between;transition:box-shadow 0.18s"
                 onmouseover="this.style.boxShadow='0 4px 16px rgba(26,111,212,0.10)'"
                 onmouseout="this.style.boxShadow='none'">

                <div style="display:flex;align-items:center;gap:14px">

                    {{-- Type icon --}}
                    <div style="width:46px;height:46px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;
                        {{ $c->type === 'training' ? 'background:#dcfce7' : 'background:#dbeafe' }}">
                        {{ $c->type === 'training' ? '🏋️' : '📚' }}
                    </div>

                    <div>
                        <div style="font-size:0.75rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:3px;
                            {{ $c->type === 'training' ? 'color:#16a34a' : 'color:#2563eb' }}">
                            {{ ucfirst($c->type) }}
                        </div>
                        <div style="font-size:0.95rem;font-weight:600;color:#0d1f3c">
                            {{ $c->type === 'training' ? ($c->training->title ?? 'Training #'.$c->item_id) : ($c->course->title ?? 'Course #'.$c->item_id) }}
                        </div>
                        <div style="font-size:0.8rem;color:#8aaac8;margin-top:2px">Item ID: {{ $c->item_id }}</div>
                    </div>
                </div>

                {{-- Remove button --}}
                <a href="/cart/remove/{{ $c->id }}"
                   style="display:inline-flex;align-items:center;gap:4px;padding:6px 14px;border-radius:8px;background:#fee2e2;color:#dc2626;font-size:0.8rem;font-weight:600;text-decoration:none;border:1px solid #fca5a5;transition:background 0.18s;flex-shrink:0"
                   onmouseover="this.style.background='#fecaca'"
                   onmouseout="this.style.background='#fee2e2'"
                >✕ Remove</a>

            </div>
            @endforeach
        </div>

        {{-- Summary box --}}
        <div style="background:linear-gradient(135deg,#e3eefd,#f0f6ff);border:1px solid #d0e2f7;border-radius:16px;padding:1.25rem 1.5rem;margin-bottom:1.5rem">
            <div style="display:flex;justify-content:space-between;align-items:center">
                <div>
                    <div style="font-size:0.8rem;color:#4a6890;font-weight:600;text-transform:uppercase;letter-spacing:0.05em">Total Items</div>
                    <div style="font-family:'Bebas Neue',sans-serif;font-size:2rem;letter-spacing:0.03em;color:#0d1f3c">{{ count($cart) }}</div>
                </div>
                <div style="text-align:right">
                    <div style="font-size:0.8rem;color:#4a6890;font-weight:600;text-transform:uppercase;letter-spacing:0.05em">Ready to checkout?</div>
                    <div style="font-size:0.85rem;color:#8aaac8;margin-top:2px">Review your items above</div>
                </div>
            </div>
        </div>

        {{-- Place order --}}
        <a href="/place-order"
           style="display:flex;align-items:center;justify-content:center;gap:8px;width:100%;padding:13px;border-radius:12px;background:#16a34a;color:#fff;font-size:1rem;font-weight:600;text-decoration:none;transition:background 0.18s;font-family:'DM Sans',sans-serif"
           onmouseover="this.style.background='#15803d'"
           onmouseout="this.style.background='#16a34a'"
        >
            ✅ Place Order
        </a>

        <a href="/"
           style="display:flex;align-items:center;justify-content:center;gap:6px;margin-top:10px;padding:11px;border-radius:12px;background:#e3eefd;color:#1a6fd4;font-size:0.9rem;font-weight:600;text-decoration:none;border:1px solid #93c5fd;transition:background 0.18s"
           onmouseover="this.style.background='#c8dff9'"
           onmouseout="this.style.background='#e3eefd'"
        >← Continue Shopping</a>

    @endif

</div>

@endsection