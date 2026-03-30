@extends('dashboard.layouts.app')

@section('content')

<div class="max-w-5xl">

  <!-- Page Title -->

  <h2 class="text-2xl font-semibold mb-8 flex items-center gap-2">
    ⭐ Coach
    <span class="text-yellow-500">
      Feedback
    </span>
  </h2>


  <div class="space-y-6">

    <!-- Feedback Card -->

    <div class="bg-white p-6 rounded-xl shadow">

      <div class="flex justify-between items-start mb-4">

        <div>

          <h3 class="text-lg font-semibold">
            Coach Anderson
          </h3>

          <p class="text-sm text-gray-500">
            Mar 10
          </p>

        </div>


        <div class="text-yellow-400 text-lg">
          ★★★★☆
        </div>

      </div>


      <!-- Skill -->

      <div class="space-y-4">

        <div class="flex items-center gap-4">

          <span class="w-24 text-gray-600 text-sm">
            Skill
          </span>

          <div class="flex-1 bg-gray-200 rounded-full h-2">

            <div class="bg-green-600 h-2 rounded-full w-[80%]"></div>

          </div>

          <span class="text-sm">
            8/10
          </span>

        </div>


        <!-- Discipline -->

        <div class="flex items-center gap-4">

          <span class="w-24 text-gray-600 text-sm">
            Discipline
          </span>

          <div class="flex-1 bg-gray-200 rounded-full h-2">

            <div class="bg-green-600 h-2 rounded-full w-[90%]"></div>

          </div>

          <span class="text-sm">
            9/10
          </span>

        </div>


        <!-- Fitness -->

        <div class="flex items-center gap-4">

          <span class="w-24 text-gray-600 text-sm">
            Fitness
          </span>

          <div class="flex-1 bg-gray-200 rounded-full h-2">

            <div class="bg-green-600 h-2 rounded-full w-[70%]"></div>

          </div>

          <span class="text-sm">
            7/10
          </span>

        </div>


        <!-- Match -->

        <div class="flex items-center gap-4">

          <span class="w-24 text-gray-600 text-sm">
            Match
          </span>

          <div class="flex-1 bg-gray-200 rounded-full h-2">

            <div class="bg-green-600 h-2 rounded-full w-[80%]"></div>

          </div>

          <span class="text-sm">
            8/10
          </span>

        </div>

      </div>


      <!-- Comment -->

      <p class="text-gray-600 italic mt-6">
        "Excellent improvement in cover drives. Need to work on playing spin."
      </p>

    </div>



    <!-- Feedback Card 2 -->

    <div class="bg-white p-6 rounded-xl shadow">

      <div class="flex justify-between items-start mb-4">

        <div>

          <h3 class="text-lg font-semibold">
            Coach Root
          </h3>

          <p class="text-sm text-gray-500">
            Mar 5
          </p>

        </div>

        <div class="text-yellow-400 text-lg">
          ★★★★☆
        </div>

      </div>


      <div class="space-y-4">

        <!-- Skill -->

        <div class="flex items-center gap-4">

          <span class="w-24 text-gray-600 text-sm">
            Skill
          </span>

          <div class="flex-1 bg-gray-200 rounded-full h-2">

            <div class="bg-green-600 h-2 rounded-full w-[90%]"></div>

          </div>

          <span class="text-sm">
            9/10
          </span>

        </div>


        <!-- Discipline -->

        <div class="flex items-center gap-4">

          <span class="w-24 text-gray-600 text-sm">
            Discipline
          </span>

          <div class="flex-1 bg-gray-200 rounded-full h-2">

            <div class="bg-green-600 h-2 rounded-full w-[80%]"></div>

          </div>

          <span class="text-sm">
            8/10
          </span>

        </div>


        <!-- Fitness -->

        <div class="flex items-center gap-4">

          <span class="w-24 text-gray-600 text-sm">
            Fitness
          </span>

          <div class="flex-1 bg-gray-200 rounded-full h-2">

            <div class="bg-green-600 h-2 rounded-full w-[80%]"></div>

          </div>

          <span class="text-sm">
            8/10
          </span>

        </div>


        <!-- Match -->

        <div class="flex items-center gap-4">

          <span class="w-24 text-gray-600 text-sm">
            Match
          </span>

          <div class="flex-1 bg-gray-200 rounded-full h-2">

            <div class="bg-green-600 h-2 rounded-full w-[90%]"></div>

          </div>

          <span class="text-sm">
            9/10
          </span>

        </div>

      </div>


      <p class="text-gray-600 italic mt-6">
        "Outstanding match performance. Keep up the consistency."
      </p>

    </div>

  </div>

</div>

@endsection