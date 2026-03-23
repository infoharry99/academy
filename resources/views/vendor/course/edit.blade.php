@extends('vendor.layout')

@section('page_title', 'Edit training')

@section('content')

<div style="max-width:620px">

    {{-- Section header --}}
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:2rem;padding-bottom:1.25rem;border-bottom:1.5px solid #d0e2f7">
        <div style="width:44px;height:44px;border-radius:10px;background:#dbeafe;display:flex;align-items:center;justify-content:center;font-size:1.25rem">✏️</div>
        <div>
            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.9rem;letter-spacing:0.05em;color:#0d1f3c">Edit training</div>
            <div style="font-size:0.8rem;color:#8aaac8;font-weight:500">Updating <strong style="color:#4a6890">{{ $course->title }}</strong></div>
        </div>
    </div>

    {{-- Form card --}}
    <div style="background:#fff;border:1px solid #d0e2f7;border-radius:16px;overflow:hidden;box-shadow:0 4px 16px rgba(26,111,212,0.07)">
        <div style="padding:1.75rem">
            <form method="POST" action="/vendor/course/update/{{ $course->id }}">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div style="margin-bottom:1.25rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">training Title</label>
                    <input
                        name="title"
                        type="text"
                        placeholder="e.g. Sports Psychology Masterclass"
                        value="{{ old('title', $course->title) }}"
                        style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;transition:border-color 0.18s;font-family:'DM Sans',sans-serif"
                        onfocus="this.style.borderColor='#2563eb';this.style.background='#fff'"
                        onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                    >
                    @error('title')
                        <span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Price --}}
                <div style="margin-bottom:1.25rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Price (£)</label>
                    <div style="position:relative">
                        <span style="position:absolute;left:14px;top:50%;transform:translateY(-50%);font-size:1rem;color:#8aaac8;pointer-events:none">£</span>
                        <input
                            name="price"
                            type="number"
                            min="0"
                            placeholder="0.00"
                            value="{{ old('price', $course->price) }}"
                            style="width:100%;padding:10px 14px 10px 30px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;transition:border-color 0.18s;font-family:'DM Sans',sans-serif"
                            onfocus="this.style.borderColor='#2563eb';this.style.background='#fff'"
                            onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                        >
                    </div>
                    @error('price')
                        <span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Description --}}
                <div style="margin-bottom:1.75rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Description</label>
                    <textarea
                        name="description"
                        rows="4"
                        placeholder="Describe what this course covers..."
                        style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;resize:vertical;transition:border-color 0.18s;font-family:'DM Sans',sans-serif;line-height:1.6"
                        onfocus="this.style.borderColor='#2563eb';this.style.background='#fff'"
                        onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                    >{{ old('description', $course->description) }}</textarea>
                    @error('description')
                        <span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Actions --}}
                <div style="display:flex;gap:10px">
                    <button
                        type="submit"
                        style="flex:1;padding:11px;border-radius:10px;background:#1a6fd4;color:#fff;font-size:0.95rem;font-weight:600;border:none;cursor:pointer;transition:background 0.18s;font-family:'DM Sans',sans-serif"
                        onmouseover="this.style.background='#1558b0'"
                        onmouseout="this.style.background='#1a6fd4'"
                    >💾 Update training</button>

                    <a href="/vendor/course"
                       style="padding:11px 20px;border-radius:10px;background:#e3eefd;color:#1a6fd4;font-size:0.95rem;font-weight:600;text-decoration:none;border:1px solid #93c5fd;transition:background 0.18s;display:inline-flex;align-items:center"
                       onmouseover="this.style.background='#c8dff9'"
                       onmouseout="this.style.background='#e3eefd'"
                    >Cancel</a>
                </div>

            </form>
        </div>
    </div>

    {{-- Danger zone --}}
    <div style="margin-top:1.25rem;background:#fff;border:1px solid #fca5a5;border-radius:12px;padding:1rem 1.25rem;display:flex;align-items:center;justify-content:space-between;gap:12px">
        <div>
            <div style="font-size:0.8rem;font-weight:700;color:#dc2626;margin-bottom:2px">Danger Zone</div>
            <div style="font-size:0.8rem;color:#ef4444">Permanently delete this course and all its data.</div>
        </div>
        <form method="POST" action="/vendor/course/delete/{{ $course->id }}"
              onsubmit="return confirm('Delete \'{{ addslashes($course->title) }}\'? This cannot be undone.')">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                style="padding:8px 18px;border-radius:9px;background:#fee2e2;color:#dc2626;font-size:0.82rem;font-weight:600;border:1px solid #fca5a5;cursor:pointer;transition:background 0.18s;font-family:'DM Sans',sans-serif;white-space:nowrap"
                onmouseover="this.style.background='#fecaca'"
                onmouseout="this.style.background='#fee2e2'"
            >🗑 Delete</button>
        </form>
    </div>

</div>

@endsection