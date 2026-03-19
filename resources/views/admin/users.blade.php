@extends('admin.layout')

@section('content')

<h2>All Users</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
</tr>

@foreach($users as $u)
<tr>
    <td>{{ $u->id }}</td>
    <td>{{ $u->name }}</td>
    <td>{{ $u->email }}</td>
</tr>
@endforeach

</table>

@endsection