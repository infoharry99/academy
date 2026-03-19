@extends('admin.layout')

@section('content')

<h2>All Orders</h2>

<table>
<tr>
    <th>ID</th>
    <th>User ID</th>
    <th>Total</th>
    <th>Date</th>
</tr>

@foreach($orders as $o)
<tr>
    <td>{{ $o->id }}</td>
    <td>{{ $o->user_id }}</td>
    <td>₹{{ $o->total }}</td>
    <td>{{ $o->created_at }}</td>
</tr>
@endforeach

</table>

@endsection