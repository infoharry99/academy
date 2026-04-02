@extends('vendor.layout')

@section('content')

<div class="max-w-3xl mx-auto p-6">

    <h2 class="text-2xl font-bold mb-6">✏️ Edit Match</h2>

    <form action="{{ route('vendor.matches.update', $match->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Date --}}
        <input type="date" name="match_date"
               value="{{ $match->match_date }}"
               class="w-full border p-2 rounded" required>

        {{-- Opponent --}}
        <input type="text" name="opponent_team"
               value="{{ $match->opponent_team }}"
               class="w-full border p-2 rounded" required>

        {{-- Venue --}}
        <input type="text" name="venue"
               value="{{ $match->venue }}"
               class="w-full border p-2 rounded" required>

        {{-- Match Type --}}
        <select name="match_type" class="w-full border p-2 rounded">
            <option value="T20" {{ $match->match_type == 'T20' ? 'selected' : '' }}>T20</option>
            <option value="ODI" {{ $match->match_type == 'ODI' ? 'selected' : '' }}>ODI</option>
            <option value="TEST" {{ $match->match_type == 'TEST' ? 'selected' : '' }}>TEST</option>
        </select>

        {{-- Users --}}
        <div>
            <label class="font-semibold">Assign Users</label>

            <div class="grid grid-cols-2 gap-2 mt-2">
                @foreach($users as $user)
                    <label class="flex items-center space-x-2 bg-gray-50 p-2 rounded">
                        <input type="checkbox"
                               name="users[]"
                               value="{{ $user->id }}"
                               {{ in_array($user->id, $assignedUsers) ? 'checked' : '' }}>
                        <span>{{ $user->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between">
            <a href="{{ route('vendor.matches.index') }}"
               class="bg-gray-400 text-white px-4 py-2 rounded-lg">
                Cancel
            </a>

            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                Update Match
            </button>
        </div>

    </form>

</div>

@endsection