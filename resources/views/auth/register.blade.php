@extends('layouts.app')

@section('content')

<div style="min-height:80vh;display:flex;align-items:center;justify-content:center;padding:2rem">
<div style="width:100%;max-width:420px;background:#fff;border:1px solid #d0e2f7;border-radius:20px;overflow:hidden;box-shadow:0 8px 32px rgba(26,111,212,0.10)">

    {{-- Card header --}}
    <div style="background:linear-gradient(135deg,#c8dff9,#ddeeff);padding:2rem 2rem 1.5rem;text-align:center">
        <div style="width:56px;height:56px;border-radius:50%;background:rgba(26,111,212,0.15);display:flex;align-items:center;justify-content:center;font-size:1.6rem;margin:0 auto 1rem">🏅</div>
        <div style="font-family:'Bebas Neue',sans-serif;font-size:1.6rem;letter-spacing:0.05em;color:#0d1f3c">Create Account</div>
        <div style="font-size:0.85rem;color:#4a6890;margin-top:4px">Join Sports Academy and start your journey</div>
    </div>

    {{-- Form body --}}
    <div style="padding:2rem">

        <form method="POST" action="/register">
            @csrf

            {{-- Name --}}
            <div style="margin-bottom:1rem">
                <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Full Name</label>
                <input
                    name="name"
                    type="text"
                    placeholder="Rahul Sharma"
                    value="{{ old('name') }}"
                    style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;transition:border-color 0.18s;font-family:'DM Sans',sans-serif"
                    onfocus="this.style.borderColor='#1a6fd4';this.style.background='#fff'"
                    onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                >
                @error('name')
                    <span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div style="margin-bottom:1rem">
                <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Email Address</label>
                <input
                    name="email"
                    type="email"
                    placeholder="you@example.com"
                    value="{{ old('email') }}"
                    style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;transition:border-color 0.18s;font-family:'DM Sans',sans-serif"
                    onfocus="this.style.borderColor='#1a6fd4';this.style.background='#fff'"
                    onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                >
                @error('email')
                    <span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div style="margin-bottom:1.5rem">
                <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Password</label>
                <input
                    name="password"
                    type="password"
                    placeholder="••••••••"
                    style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;transition:border-color 0.18s;font-family:'DM Sans',sans-serif"
                    onfocus="this.style.borderColor='#1a6fd4';this.style.background='#fff'"
                    onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                >
                @error('password')
                    <span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                style="width:100%;padding:11px;border-radius:10px;background:#16a34a;color:#fff;font-size:0.95rem;font-weight:600;border:none;cursor:pointer;transition:background 0.18s;font-family:'DM Sans',sans-serif;letter-spacing:0.02em"
                onmouseover="this.style.background='#15803d'"
                onmouseout="this.style.background='#16a34a'"
            >
                Create Account →
            </button>

        </form>

        {{-- Divider --}}
        <div style="display:flex;align-items:center;gap:12px;margin:1.5rem 0">
            <div style="flex:1;height:1px;background:#d0e2f7"></div>
            <span style="font-size:0.78rem;color:#8aaac8">Already have an account?</span>
            <div style="flex:1;height:1px;background:#d0e2f7"></div>
        </div>

        {{-- Login link --}}
        <div style="display:flex;gap:10px">
            <a href="/login"
               style="flex:1;text-align:center;padding:9px;border-radius:10px;background:#e3eefd;color:#1a6fd4;font-size:0.85rem;font-weight:600;text-decoration:none;border:1px solid #93c5fd;transition:background 0.18s"
               onmouseover="this.style.background='#c8dff9'"
               onmouseout="this.style.background='#e3eefd'"
            >Sign In</a>
            <a href="/vendor/register"
               style="flex:1;text-align:center;padding:9px;border-radius:10px;background:#fef3c7;color:#b45309;font-size:0.85rem;font-weight:600;text-decoration:none;border:1px solid #fcd34d;transition:background 0.18s"
               onmouseover="this.style.background='#fde68a'"
               onmouseout="this.style.background='#fef3c7'"
            >Become Seller</a>
        </div>

    </div>
</div>
</div>

@endsection