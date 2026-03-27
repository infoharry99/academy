@extends('dashboard.layouts.app')

@section('content')

<div class="max-w-5xl">

  <!-- Page Title -->

  <h2 class="text-2xl font-semibold mb-8 flex items-center gap-2">

    💰 Marketplace
    <span class="text-yellow-500">
      Orders
    </span>

  </h2>


  <div class="space-y-6">

    <!-- Order 1 -->

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

      <div>

        <h3 class="font-semibold text-lg">
          Pro Cricket Bat
        </h3>

        <p class="text-gray-500 text-sm">
          #ORD-001 • Mar 8
        </p>

      </div>


      <div class="text-right">

        <p class="font-semibold text-lg">
          ₹4,999
        </p>

        <span class="text-green-600 text-sm font-medium">
          Delivered
        </span>

      </div>

    </div>


    <!-- Order 2 -->

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

      <div>

        <h3 class="font-semibold text-lg">
          Batting Gloves
        </h3>

        <p class="text-gray-500 text-sm">
          #ORD-002 • Mar 5
        </p>

      </div>


      <div class="text-right">

        <p class="font-semibold text-lg">
          ₹1,299
        </p>

        <span class="text-yellow-500 text-sm font-medium">
          Shipped
        </span>

      </div>

    </div>


    <!-- Order 3 -->

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

      <div>

        <h3 class="font-semibold text-lg">
          Cricket Helmet
        </h3>

        <p class="text-gray-500 text-sm">
          #ORD-003 • Feb 28
        </p>

      </div>


      <div class="text-right">

        <p class="font-semibold text-lg">
          ₹3,499
        </p>

        <span class="text-green-600 text-sm font-medium">
          Delivered
        </span>

      </div>

    </div>


    <!-- Order 4 -->

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">

      <div>

        <h3 class="font-semibold text-lg">
          Training Jersey
        </h3>

        <p class="text-gray-500 text-sm">
          #ORD-004 • Feb 20
        </p>

      </div>


      <div class="text-right">

        <p class="font-semibold text-lg">
          ₹999
        </p>

        <span class="text-green-600 text-sm font-medium">
          Delivered
        </span>

      </div>

    </div>

  </div>

</div>

@endsection