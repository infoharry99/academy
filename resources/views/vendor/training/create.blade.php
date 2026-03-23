@extends('vendor.layout')

@section('page_title', 'Add Product')

@section('content')

<div style="max-width:640px">

    {{-- Section header --}}
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:2rem;padding-bottom:1.25rem;border-bottom:1.5px solid #d0e2f7">
        <div style="width:44px;height:44px;border-radius:10px;background:#dcfce7;display:flex;align-items:center;justify-content:center;font-size:1.25rem">🏋️</div>
        <div>
            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.9rem;letter-spacing:0.05em;color:#0d1f3c">Add Product</div>
            <div style="font-size:0.8rem;color:#8aaac8;font-weight:500">Fill in the details to list a new training program</div>
        </div>
    </div>

    {{-- Form card --}}
    <div style="background:#fff;border:1px solid #d0e2f7;border-radius:16px;overflow:hidden;box-shadow:0 4px 16px rgba(26,111,212,0.07)">
        <div style="padding:1.75rem">
            <form method="POST" action="/vendor/training/store" enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <div style="margin-bottom:1.25rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Product Title</label>
                    <input
                        name="title" type="text"
                        placeholder="e.g. Boxing Fundamentals"
                        value="{{ old('title') }}"
                        style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;box-sizing:border-box;font-family:'DM Sans',sans-serif"
                        onfocus="this.style.borderColor='#16a34a';this.style.background='#fff'"
                        onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                    >
                    @error('title')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                </div>

                {{-- Price --}}
                <div style="margin-bottom:1.25rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Price (£)</label>
                    <div style="position:relative">
                        <span style="position:absolute;left:14px;top:50%;transform:translateY(-50%);font-size:1rem;color:#8aaac8;pointer-events:none">£</span>
                        <input
                            name="price" type="number" min="0" step="0.01"
                            placeholder="0.00"
                            value="{{ old('price') }}"
                            style="width:100%;padding:10px 14px 10px 30px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;box-sizing:border-box;font-family:'DM Sans',sans-serif"
                            onfocus="this.style.borderColor='#16a34a';this.style.background='#fff'"
                            onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                        >
                    </div>
                    @error('price')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                </div>

                {{-- Sale Price --}}
                <div style="margin-bottom:1.25rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Sale Price (£) <span style="font-weight:400;text-transform:none;color:#8aaac8">— optional</span></label>
                    <div style="position:relative">
                        <span style="position:absolute;left:14px;top:50%;transform:translateY(-50%);font-size:1rem;color:#8aaac8;pointer-events:none">£</span>
                        <input
                            name="sale_price" type="number" min="0" step="0.01"
                            placeholder="0.00"
                            value="{{ old('sale_price') }}"
                            style="width:100%;padding:10px 14px 10px 30px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;box-sizing:border-box;font-family:'DM Sans',sans-serif"
                            onfocus="this.style.borderColor='#16a34a';this.style.background='#fff'"
                            onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                        >
                    </div>
                    @error('sale_price')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                </div>
                <div style="margin-bottom:1.25rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">
                        Category
                    </label>

                    <select name="category_id"
                        style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;background:#f0f6ff">

                        <option value="">Select Category</option>

                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">
                                {{ $cat->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Stock & SKU (side by side) --}}
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1.25rem">
                    <div>
                        <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Stock</label>
                        <input
                            name="stock" type="number" min="0"
                            placeholder="e.g. 100"
                            value="{{ old('stock') }}"
                            style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;box-sizing:border-box;font-family:'DM Sans',sans-serif"
                            onfocus="this.style.borderColor='#16a34a';this.style.background='#fff'"
                            onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                        >
                        @error('stock')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                    </div>
                    <div>
                        <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">SKU Code</label>
                        <input
                            name="sku" type="text"
                            placeholder="e.g. TRN-001"
                            value="{{ old('sku') }}"
                            style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;box-sizing:border-box;font-family:'DM Sans',sans-serif"
                            onfocus="this.style.borderColor='#16a34a';this.style.background='#fff'"
                            onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                        >
                        @error('sku')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                    </div>
                </div>

                {{-- Image Upload --}}
                <div style="margin-bottom:1.25rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Product Image</label>
                    <label style="display:flex;align-items:center;gap:10px;padding:10px 14px;border:1.5px dashed #93c5fd;border-radius:10px;background:#f0f6ff;cursor:pointer;transition:border-color 0.18s"
                           onmouseover="this.style.borderColor='#16a34a';this.style.background='#fff'"
                           onmouseout="this.style.borderColor='#93c5fd';this.style.background='#f0f6ff'"
                    >
                        <span style="font-size:1.2rem">🖼️</span>
                        <span style="font-size:0.875rem;color:#4a6890;font-family:'DM Sans',sans-serif" id="imgLabel">Choose an image…</span>
                        <input type="file" name="image" accept="image/*" style="display:none"
                               onchange="document.getElementById('imgLabel').textContent = this.files[0]?.name || 'Choose an image…'">
                    </label>
                    @error('image')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                </div>

                {{-- Flags --}}
                <div style="display:flex;gap:1.5rem;margin-bottom:1.5rem">
                    <label style="display:flex;align-items:center;gap:8px;cursor:pointer;font-size:0.875rem;color:#4a6890;font-family:'DM Sans',sans-serif;font-weight:500">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                               style="width:16px;height:16px;accent-color:#16a34a;cursor:pointer">
                        ⭐ Featured
                    </label>
                    <label style="display:flex;align-items:center;gap:8px;cursor:pointer;font-size:0.875rem;color:#4a6890;font-family:'DM Sans',sans-serif;font-weight:500">
                        <input type="checkbox" name="is_active" value="1" checked {{ old('is_active', true) ? 'checked' : '' }}
                               style="width:16px;height:16px;accent-color:#16a34a;cursor:pointer">
                        ✅ Active
                    </label>
                </div>

                {{-- Description --}}
                <div style="margin-bottom:1.75rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Description</label>
                    <textarea
                        name="description" rows="4"
                        placeholder="Describe what this training covers, who it's for, and what participants will learn..."
                        style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;resize:vertical;box-sizing:border-box;font-family:'DM Sans',sans-serif;line-height:1.6"
                        onfocus="this.style.borderColor='#16a34a';this.style.background='#fff'"
                        onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                    >{{ old('description') }}</textarea>
                    @error('description')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                </div>

                {{-- Actions --}}
                <div style="display:flex;gap:10px">
                    <button type="submit"
                        style="flex:1;padding:11px;border-radius:10px;background:#16a34a;color:#fff;font-size:0.95rem;font-weight:600;border:none;cursor:pointer;font-family:'DM Sans',sans-serif"
                        onmouseover="this.style.background='#15803d'"
                        onmouseout="this.style.background='#16a34a'"
                    >✅ Save Product</button>
                    <a href="/vendor/training"
                       style="padding:11px 20px;border-radius:10px;background:#e3eefd;color:#1a6fd4;font-size:0.95rem;font-weight:600;text-decoration:none;border:1px solid #93c5fd;display:inline-flex;align-items:center;font-family:'DM Sans',sans-serif"
                       onmouseover="this.style.background='#c8dff9'"
                       onmouseout="this.style.background='#e3eefd'"
                    >Cancel</a>
                </div>

            </form>
        </div>
    </div>

    {{-- Tips box --}}
    <div style="margin-top:1.25rem;background:#fef3c7;border:1px solid #fcd34d;border-radius:12px;padding:1rem 1.25rem;display:flex;gap:12px;align-items:flex-start">
        <span style="font-size:1.1rem;margin-top:1px">💡</span>
        <div>
            <div style="font-size:0.8rem;font-weight:700;color:#92400e;margin-bottom:4px">Tips for a great listing</div>
            <ul style="font-size:0.8rem;color:#b45309;line-height:1.7;padding-left:1rem;margin:0">
                <li>Use a clear, specific title that describes the training</li>
                <li>Set a competitive price based on duration and expertise</li>
                <li>Write a detailed description to attract more buyers</li>
            </ul>
        </div>
    </div>

</div>

@endsection