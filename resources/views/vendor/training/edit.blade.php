@extends('vendor.layout')

@section('page_title', 'Edit Product')

@section('content')

<div style="max-width:640px">

    {{-- Section header --}}
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:2rem;padding-bottom:1.25rem;border-bottom:1.5px solid #d0e2f7">
        <div style="width:44px;height:44px;border-radius:10px;background:#e0f2fe;display:flex;align-items:center;justify-content:center;font-size:1.25rem">✏️</div>
        <div>
            <div style="font-family:'Bebas Neue',sans-serif;font-size:1.9rem;letter-spacing:0.05em;color:#0d1f3c">Edit Product</div>
            <div style="font-size:0.8rem;color:#8aaac8;font-weight:500;font-family:'DM Sans',sans-serif">Updating <strong style="color:#4a6890">{{ $product->title }}</strong></div>
        </div>
    </div>

    {{-- Form card --}}
    <div style="background:#fff;border:1px solid #d0e2f7;border-radius:16px;overflow:hidden;box-shadow:0 4px 16px rgba(26,111,212,0.07)">
        <div style="padding:1.75rem">
            <form method="POST" action="/vendor/training/update/{{ $product->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div style="margin-bottom:1.25rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Product Title</label>
                    <input
                        name="title" type="text"
                        placeholder="e.g. Boxing Fundamentals"
                        value="{{ old('title', $product->title) }}"
                        style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;box-sizing:border-box;font-family:'DM Sans',sans-serif"
                        onfocus="this.style.borderColor='#1a6fd4';this.style.background='#fff'"
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
                            value="{{ old('price', $product->price) }}"
                            style="width:100%;padding:10px 14px 10px 30px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;box-sizing:border-box;font-family:'DM Sans',sans-serif"
                            onfocus="this.style.borderColor='#1a6fd4';this.style.background='#fff'"
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
                            value="{{ old('sale_price', $product->sale_price) }}"
                            style="width:100%;padding:10px 14px 10px 30px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;box-sizing:border-box;font-family:'DM Sans',sans-serif"
                            onfocus="this.style.borderColor='#1a6fd4';this.style.background='#fff'"
                            onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                        >
                    </div>
                    @error('sale_price')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                </div>

                {{-- Stock & SKU --}}
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1.25rem">
                    <div>
                        <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Stock</label>
                        <input
                            name="stock" type="number" min="0"
                            placeholder="e.g. 100"
                            value="{{ old('stock', $product->stock) }}"
                            style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;box-sizing:border-box;font-family:'DM Sans',sans-serif"
                            onfocus="this.style.borderColor='#1a6fd4';this.style.background='#fff'"
                            onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                        >
                        @error('stock')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                    </div>
                    <div>
                        <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">SKU Code</label>
                        <input
                            name="sku" type="text"
                            placeholder="e.g. TRN-001"
                            value="{{ old('sku', $product->sku) }}"
                            style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;box-sizing:border-box;font-family:'DM Sans',sans-serif"
                            onfocus="this.style.borderColor='#1a6fd4';this.style.background='#fff'"
                            onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                        >
                        @error('sku')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                    </div>
                </div>

                {{-- Image Upload --}}
                <div style="margin-bottom:1.25rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Product Image <span style="font-weight:400;text-transform:none;color:#8aaac8">— leave blank to keep current</span></label>
                    @if($product->image)
                        <div style="margin-bottom:8px">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Current image"
                                 style="width:80px;height:80px;object-fit:cover;border-radius:8px;border:1.5px solid #d0e2f7">
                        </div>
                    @endif
                    <label style="display:flex;align-items:center;gap:10px;padding:10px 14px;border:1.5px dashed #93c5fd;border-radius:10px;background:#f0f6ff;cursor:pointer"
                           onmouseover="this.style.borderColor='#1a6fd4';this.style.background='#fff'"
                           onmouseout="this.style.borderColor='#93c5fd';this.style.background='#f0f6ff'"
                    >
                        <span style="font-size:1.2rem">🖼️</span>
                        <span style="font-size:0.875rem;color:#4a6890;font-family:'DM Sans',sans-serif" id="editImgLabel">Choose a new image…</span>
                        <input type="file" name="image" accept="image/*" style="display:none"
                               onchange="document.getElementById('editImgLabel').textContent = this.files[0]?.name || 'Choose a new image…'">
                    </label>
                    @error('image')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                </div>

                {{-- Flags --}}
                <div style="display:flex;gap:1.5rem;margin-bottom:1.5rem">
                    <label style="display:flex;align-items:center;gap:8px;cursor:pointer;font-size:0.875rem;color:#4a6890;font-family:'DM Sans',sans-serif;font-weight:500">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                               style="width:16px;height:16px;accent-color:#1a6fd4;cursor:pointer">
                        ⭐ Featured
                    </label>
                    <label style="display:flex;align-items:center;gap:8px;cursor:pointer;font-size:0.875rem;color:#4a6890;font-family:'DM Sans',sans-serif;font-weight:500">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                               style="width:16px;height:16px;accent-color:#1a6fd4;cursor:pointer">
                        ✅ Active
                    </label>
                </div>

                {{-- Description --}}
                <div style="margin-bottom:1.75rem">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#4a6890;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:6px">Description</label>
                    <textarea
                        name="description" rows="4"
                        placeholder="Describe what this training covers..."
                        style="width:100%;padding:10px 14px;border:1.5px solid #d0e2f7;border-radius:10px;font-size:0.95rem;color:#0d1f3c;background:#f0f6ff;outline:none;resize:vertical;box-sizing:border-box;font-family:'DM Sans',sans-serif;line-height:1.6"
                        onfocus="this.style.borderColor='#1a6fd4';this.style.background='#fff'"
                        onblur="this.style.borderColor='#d0e2f7';this.style.background='#f0f6ff'"
                    >{{ old('description', $product->description) }}</textarea>
                    @error('description')<span style="font-size:0.78rem;color:#dc2626;margin-top:4px;display:block">{{ $message }}</span>@enderror
                </div>

                {{-- Actions --}}
                <div style="display:flex;gap:10px">
                    <button type="submit"
                        style="flex:1;padding:11px;border-radius:10px;background:#1a6fd4;color:#fff;font-size:0.95rem;font-weight:600;border:none;cursor:pointer;font-family:'DM Sans',sans-serif"
                        onmouseover="this.style.background='#1558b0'"
                        onmouseout="this.style.background='#1a6fd4'"
                    >💾 Update Product</button>
                    <a href="/vendor/training"
                       style="padding:11px 20px;border-radius:10px;background:#e3eefd;color:#1a6fd4;font-size:0.95rem;font-weight:600;text-decoration:none;border:1px solid #93c5fd;display:inline-flex;align-items:center;font-family:'DM Sans',sans-serif"
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
            <div style="font-size:0.8rem;font-weight:700;color:#dc2626;margin-bottom:2px;font-family:'DM Sans',sans-serif">Danger Zone</div>
            <div style="font-size:0.8rem;color:#ef4444;font-family:'DM Sans',sans-serif">Permanently delete this product and all its data.</div>
        </div>
        <form method="POST" action="/vendor/training/delete/{{ $product->id }}"
              onsubmit="return confirm('Delete this product? This cannot be undone.')">
            @csrf
            @method('DELETE')
            <button type="submit"
                style="padding:8px 18px;border-radius:9px;background:#fee2e2;color:#dc2626;font-size:0.82rem;font-weight:600;border:1px solid #fca5a5;cursor:pointer;white-space:nowrap;font-family:'DM Sans',sans-serif"
                onmouseover="this.style.background='#fecaca'"
                onmouseout="this.style.background='#fee2e2'"
            >🗑 Delete Product</button>
        </form>
    </div>

</div>

@endsection