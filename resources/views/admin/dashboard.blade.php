@extends('admin.layout')

@section('content')

<h2>Dashboard</h2>

<div class="cards p-5">

    <div class="card">👤 Users <br>{{ $data['users'] }}</div>
    <div class="card">🏪 Vendors <br>{{ $data['vendors'] }}</div>
    <div class="card">🏋️ Products <br>{{ $data['products'] }}</div>
    <div class="card">📚 Courses <br>{{ $data['courses'] }}</div>
    <div class="card">📦 Orders <br>{{ $data['orders'] }}</div>

</div>

@endsection