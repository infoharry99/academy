{{-- @extends('dashboard.layouts.app')

@section('content')

<div class="max-w-5xl">

  <h2 class="text-2xl font-semibold mb-6 flex items-center gap-2">
    📅 Upcoming
    <span class="text-yellow-500">
      Matches
    </span>
  </h2>


  <div class="space-y-5">

    <!-- Match 1 -->

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

      <div class="flex items-center gap-6">

        <div class="text-green-600 font-semibold">
          Mar 15
        </div>

        <div>

          <h3 class="font-semibold text-lg">
            vs City Cricket Club
          </h3>

          <p class="text-gray-500 text-sm">
            Home Ground
          </p>

        </div>

      </div>


      <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm">
        T20
      </span>

    </div>


    <!-- Match 2 -->

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

      <div class="flex items-center gap-6">

        <div class="text-green-600 font-semibold">
          Mar 22
        </div>

        <div>

          <h3 class="font-semibold text-lg">
            vs Royal Strikers
          </h3>

          <p class="text-gray-500 text-sm">
            Stadium A
          </p>

        </div>

      </div>


      <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm">
        ODI
      </span>

    </div>


    <!-- Match 3 -->

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

      <div class="flex items-center gap-6">

        <div class="text-green-600 font-semibold">
          Mar 29
        </div>

        <div>

          <h3 class="font-semibold text-lg">
            vs Thunder XI
          </h3>

          <p class="text-gray-500 text-sm">
            Away
          </p>

        </div>

      </div>


      <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm">
        T20
      </span>

    </div>


    <!-- Match 4 -->

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

      <div class="flex items-center gap-6">

        <div class="text-green-600 font-semibold">
          Apr 5
        </div>

        <div>

          <h3 class="font-semibold text-lg">
            vs Rising Stars
          </h3>

          <p class="text-gray-500 text-sm">
            Home Ground
          </p>

        </div>

      </div>


      <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm">
        Test
      </span>

    </div>


    <!-- Match 5 -->

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

      <div class="flex items-center gap-6">

        <div class="text-green-600 font-semibold">
          Apr 12
        </div>

        <div>

          <h3 class="font-semibold text-lg">
            vs Elite Warriors
          </h3>

          <p class="text-gray-500 text-sm">
            National Stadium
          </p>

        </div>

      </div>


      <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm">
        T20
      </span>

    </div>

  </div>

</div>

@endsection --}}


@extends('dashboard.layouts.app')

@section('content')

<div class="max-w-5xl">

  <h2 class="text-2xl font-semibold mb-6 flex items-center gap-2">
    📅 Upcoming
    <span class="text-yellow-500">Matches</span>
  </h2>

  <div class="space-y-5">

    @forelse($matches as $match)

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

      <div class="flex items-center gap-6">

        {{-- Date --}}
        <div class="text-green-600 font-semibold">
          {{ \Carbon\Carbon::parse($match->match_date)->format('M d') }}
        </div>

        {{-- Match Info --}}
        <div>
          <h3 class="font-semibold text-lg">
            vs {{ $match->opponent_team }}
          </h3>

          <p class="text-gray-500 text-sm">
            {{ $match->venue }}
          </p>
        </div>

      </div>

      {{-- Match Type --}}
      <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm">
        {{ $match->match_type }}
      </span>

    </div>

    @empty

    <div class="text-center text-gray-500">
      No upcoming matches found
    </div>

    @endforelse

  </div>

</div>

@endsection