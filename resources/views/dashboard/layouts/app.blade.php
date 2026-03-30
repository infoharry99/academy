<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />

  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  />

  <title>Player Dashboard</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  {{-- fa link --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"> 

</head>


<body class="bg-gray-100">

  <!-- Mobile Header -->

  <header class="md:hidden flex items-center justify-between p-4 bg-gray-900 text-white w-full">

    <button
      onclick="openSidebar()"
      class="text-2xl"
    >
      ☰
    </button>

    <h2 class="font-bold">
      🏏 Adnan  Academy
    </h2>

  </header>



  <!-- Overlay -->

  <div
    id="sidebarOverlay"
    onclick="closeSidebar()"
    class="fixed inset-0 bg-black/40 hidden z-40 md:hidden"
  ></div>



  <div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->

    @include('dashboard.layouts.sidebar')


    <!-- MAIN CONTENT -->

    <main class="flex-1 p-6 md:p-8  overflow-y-auto">

      <!-- Header -->

      @if(!request()->is('payments'))
        <div class="flex justify-between items-center mb-8">

          <div>

            <h1 class="text-2xl font-semibold">

              Welcome back,

              <span class="text-yellow-500">
                Virat
              </span>

              👋

            </h1>

            <p class="text-gray-500">
              Here's your performance overview
            </p>

          </div>

          <div class="text-green-600 font-medium">
            📈 Form: Excellent
          </div>

        </div>
      @endif



        <!-- Stats -->
      @if(!request()->is('payments'))
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

          <div class="bg-white p-6 rounded-xl shadow">

            <h3 class="text-3xl font-bold">
              48
            </h3>

            <p class="text-gray-500">
              Matches
            </p>

          </div>


          <div class="bg-white p-6 rounded-xl shadow">

            <h3 class="text-3xl font-bold">
              2,456
            </h3>

            <p class="text-gray-500">
              Total Runs
            </p>

          </div>


          <div class="bg-white p-6 rounded-xl shadow">

            <h3 class="text-3xl font-bold">
              32
            </h3>

            <p class="text-gray-500">
              Wickets
            </p>

          </div>


          <div class="bg-white p-6 rounded-xl shadow">

            <h3 class="text-3xl font-bold">
              8.5
            </h3>

            <p class="text-gray-500">
              Avg Rating
            </p>

          </div>

        </div>
      @endif  
      @yield('content')

    </main>

  </div>



  <script>

    function openSidebar()
    {
      document
        .getElementById("sidebar")
        .classList
        .remove("-translate-x-full");

      document
        .getElementById("sidebarOverlay")
        .classList
        .remove("hidden");
    }


    function closeSidebar()
    {
      document
        .getElementById("sidebar")
        .classList
        .add("-translate-x-full");

      document
        .getElementById("sidebarOverlay")
        .classList
        .add("hidden");
    }

  </script>

</body>

</html>