@extends('admin.layout')

@section('content')

<h2 style="margin-bottom:15px">🏪 Vendor List</h2>

@if($vendors->count() == 0)

    <div style="background:#fff;padding:20px;border-radius:10px">
        No vendors found 😢
    </div>

@else

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Type</th>
        <th>Joined</th>
    </tr>

    @foreach($vendors as $v)
    <tr>
        <td>{{ $v->id }}</td>
        <td>{{ $v->name }}</td>
        <td>{{ $v->email }}</td>

        <!-- TYPE BADGE -->
        <td>
            @if($v->type == 'training')
                <span style="background:#dcfce7;color:#16a34a;padding:4px 8px;border-radius:6px;font-size:12px">
                    Product Vendor
                </span>
            @else
                <span style="background:#dbeafe;color:#2563eb;padding:4px 8px;border-radius:6px;font-size:12px">
                    Training Vendor 
                </span>
            @endif
        </td>

        <td>{{ $v->created_at->format('d M Y') }}</td>
    </tr>
    @endforeach

</table>

@endif

@endsection