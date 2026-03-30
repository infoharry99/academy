@extends('dashboard.layouts.app')

@section('content')

<div class="max-w-6xl">

  <!-- Title -->

  <h2 class="text-2xl font-semibold mb-6 flex items-center gap-2">

    👥 Team
    <span class="text-yellow-500">
      Rankings
    </span>

  </h2>


  <!-- Table -->

  <div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full text-left">

      <!-- Header -->

      <thead class="bg-gray-500 text-white text-sm">

        <tr>

          <th class="p-4">
            #
          </th>

          <th class="p-4">
            Player
          </th>

          <th class="p-4">
            Role
          </th>

          <th class="p-4">
            Runs
          </th>

          <th class="p-4">
            Wkts
          </th>

          <th class="p-4">
            Rating
          </th>

        </tr>

      </thead>


      <!-- Body -->

      <tbody class="divide-y">

        <!-- Rank 1 -->

        <tr class="hover:bg-gray-50">

          <td class="p-4">
            🥇
          </td>

          <td class="p-4 font-medium">
            Virat K.
          </td>

          <td class="p-4 text-gray-600">
            Batsman
          </td>

          <td class="p-4">
            2,456
          </td>

          <td class="p-4">
            32
          </td>

          <td class="p-4 text-green-600 font-semibold">
            9.2
          </td>

        </tr>


        <!-- Rank 2 -->

        <tr class="hover:bg-gray-50">

          <td class="p-4">
            🥈
          </td>

          <td class="p-4 font-medium">
            Rohit S.
          </td>

          <td class="p-4 text-gray-600">
            Batsman
          </td>

          <td class="p-4">
            2,180
          </td>

          <td class="p-4">
            5
          </td>

          <td class="p-4 text-green-600 font-semibold">
            8.8
          </td>

        </tr>


        <!-- Rank 3 -->

        <tr class="hover:bg-gray-50">

          <td class="p-4">
            🥉
          </td>

          <td class="p-4 font-medium">
            Joe Root
          </td>

          <td class="p-4 text-gray-600">
            Bowler
          </td>

          <td class="p-4">
            320
          </td>

          <td class="p-4">
            78
          </td>

          <td class="p-4 text-green-600 font-semibold">
            8.7
          </td>

        </tr>


        <!-- Rank 4 -->

        <tr class="hover:bg-gray-50">

          <td class="p-4">
            4
          </td>

          <td class="p-4 font-medium">
            Michel G.
          </td>

          <td class="p-4 text-gray-600">
            All-rounder
          </td>

          <td class="p-4">
            1,560
          </td>

          <td class="p-4">
            45
          </td>

          <td class="p-4 text-green-600 font-semibold">
            8.5
          </td>

        </tr>


        <!-- Rank 5 -->

        <tr class="hover:bg-gray-50">

          <td class="p-4">
            5
          </td>

          <td class="p-4 font-medium">
            Moeen A.
          </td>

          <td class="p-4 text-gray-600">
            WK-Batsman
          </td>

          <td class="p-4">
            1,890
          </td>

          <td class="p-4">
            0
          </td>

          <td class="p-4 text-green-600 font-semibold">
            8.3
          </td>

        </tr>


        <!-- Rank 6 -->

        <tr class="hover:bg-gray-50">

          <td class="p-4">
            6
          </td>

          <td class="p-4 font-medium">
            Krish N.
          </td>

          <td class="p-4 text-gray-600">
            All-rounder
          </td>

          <td class="p-4">
            1,340
          </td>

          <td class="p-4">
            38
          </td>

          <td class="p-4 text-green-600 font-semibold">
            8.1
          </td>

        </tr>


        <!-- Rank 7 -->

        <tr class="hover:bg-gray-50">

          <td class="p-4">
            7
          </td>

          <td class="p-4 font-medium">
            Dwight Y.
          </td>

          <td class="p-4 text-gray-600">
            Batsman
          </td>

          <td class="p-4">
            1,780
          </td>

          <td class="p-4">
            2
          </td>

          <td class="p-4 text-green-600 font-semibold">
            8
          </td>

        </tr>


        <!-- Rank 8 -->

        <tr class="hover:bg-gray-50">

          <td class="p-4">
            8
          </td>

          <td class="p-4 font-medium">
            Mohammed S.
          </td>

          <td class="p-4 text-gray-600">
            Bowler
          </td>

          <td class="p-4">
            210
          </td>

          <td class="p-4">
            65
          </td>

          <td class="p-4 text-green-600 font-semibold">
            7.9
          </td>

        </tr>

      </tbody>

    </table>

  </div>

</div>

@endsection