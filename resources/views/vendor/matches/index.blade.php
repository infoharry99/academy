@extends('vendor.layout')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">📅 Upcoming Matches</h2>
        <a href="{{ route('vendor.matches.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            + Add Match
        </a>
    </div>

    @foreach($matches as $match)
    <div class="bg-white shadow rounded-xl p-5 mb-4 flex justify-between items-center">

        <div>
            <p class="text-green-600 font-semibold">
                {{ \Carbon\Carbon::parse($match->match_date)->format('M d') }}
            </p>

            <h3 class="text-lg font-semibold">
                vs {{ $match->opponent_team }}
            </h3>

            <p class="text-gray-500 text-sm">
                {{ $match->venue }}
            </p>
        </div>

        <div class="flex items-center gap-2">
            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                {{ $match->match_type }}
            </span>
            <a href="{{ route('vendor.matches.edit', $match->id) }}"
                class="text-blue-600 text-sm font-semibold">
                Edit
            </a>
        </div>
    </div>
    @endforeach

</div>

@endsection