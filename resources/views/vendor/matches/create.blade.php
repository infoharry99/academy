@extends('vendor.layout')

@section('content')

<div class="max-w-3xl mx-auto p-6">

    <h2 class="text-2xl font-bold mb-6">➕ Create Match</h2>

    <form action="{{ route('vendor.matches.store') }}" method="POST" class="space-y-4">
        @csrf

        <input type="date" name="match_date" class="w-full border p-2 rounded" required>

        <input type="text" name="opponent_team" placeholder="Opponent Team"
               class="w-full border p-2 rounded" required>

        <input type="text" name="venue" placeholder="Venue"
               class="w-full border p-2 rounded" required>

        <select name="match_type" class="w-full border p-2 rounded">
            <option value="T20">T20</option>
            <option value="ODI">ODI</option>
            <option value="TEST">TEST</option>
        </select>

        {{-- Users --}}
        <div>
            <label class="font-semibold">Assign Users</label>
            <div class="grid grid-cols-2 gap-2 mt-2">
                @foreach($users as $user)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="users[]" value="{{ $user->id }}">
                        <span>{{ $user->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded-lg">
            Save Match
        </button>

    </form>

</div>

@endsection