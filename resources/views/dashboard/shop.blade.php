<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Cricket Shop</title>

  <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100">

  <!-- HEADER -->

  <header
    class="w-full py-5 px-8 flex justify-between items-center text-white"
    style="
      background:
      linear-gradient(
        135deg,
        hsl(220 50% 12%),
        hsl(220 45% 18%),
        hsl(145 40% 20%)
      );
    "
  >

    <div class="flex items-center gap-4">

      <a href="/dashboard" class="text-xl">
        ←
      </a>

      <h1 class="text-xl font-semibold">
        Cricket
        <span class="text-yellow-400">
          Shop
        </span>
      </h1>

    </div>


    <button
      class="bg-white text-green-700 px-4 py-2 rounded-lg flex items-center gap-2"
    >
      🛒 Cart
    </button>

  </header>



  <!-- CONTENT -->

  <div class="max-w-7xl mx-auto px-6 py-8">

    <!-- SEARCH + FILTER -->

    <div class="flex flex-col md:flex-row gap-4 mb-8">

      <input
        type="text"
        placeholder="Search products..."
        class="flex-1 border rounded-lg px-4 py-2"
      />

      <div class="flex gap-2 flex-wrap">

        <button class="bg-green-600 text-white px-4 py-2 rounded-lg">
          All
        </button>

        <button class="border px-4 py-2 rounded-lg">
          Bats
        </button>

        <button class="border px-4 py-2 rounded-lg">
          Gloves
        </button>

        <button class="border px-4 py-2 rounded-lg">
          Pads
        </button>

        <button class="border px-4 py-2 rounded-lg">
          Helmets
        </button>

        <button class="border px-4 py-2 rounded-lg">
          Jerseys
        </button>

        <button class="border px-4 py-2 rounded-lg">
          Shoes
        </button>

      </div>

    </div>



    <!-- PRODUCTS GRID -->

    <div class="grid md:grid-cols-3 gap-6">

      <!-- PRODUCT -->

      <div class="bg-white rounded-xl shadow overflow-hidden">

        <img
          src="{{ asset('assets/equipment.jpg') }}"
          class="w-full h-52 object-cover"
        >

        <div class="p-5">

          <p class="text-green-600 text-sm">
            Bats
          </p>

          <h3 class="font-semibold mb-2">
            Pro Cricket Bat - English Willow
          </h3>

          <div class="flex justify-between items-center mt-4">

            <span class="text-yellow-500 text-lg font-semibold">
              ₹4,999
            </span>

            <button
              class="bg-green-600 text-white px-4 py-2 rounded-lg"
            >
              Add to Cart
            </button>

          </div>

        </div>

      </div>



      <!-- PRODUCT -->

      <div class="bg-white rounded-xl shadow overflow-hidden">

        <img
          src="{{ asset('assets/equipment.jpg') }}"
          class="w-full h-52 object-cover"
        >

        <div class="p-5">

          <p class="text-green-600 text-sm">
            Bats
          </p>

          <h3 class="font-semibold mb-2">
            Kashmir Willow Training Bat
          </h3>

          <div class="flex justify-between items-center mt-4">

            <span class="text-yellow-500 text-lg font-semibold">
              ₹2,499
            </span>

            <button
              class="bg-green-600 text-white px-4 py-2 rounded-lg"
            >
              Add to Cart
            </button>

          </div>

        </div>

      </div>



      <!-- PRODUCT -->

      <div class="bg-white rounded-xl shadow overflow-hidden">

        <img
          src="{{ asset('assets/equipment.jpg') }}"

          class="w-full h-52 object-cover"
        >

        <div class="p-5">

          <p class="text-green-600 text-sm">
            Gloves
          </p>

          <h3 class="font-semibold mb-2">
            Premium Batting Gloves
          </h3>

          <div class="flex justify-between items-center mt-4">

            <span class="text-yellow-500 text-lg font-semibold">
              ₹1,299
            </span>

            <button
              class="bg-green-600 text-white px-4 py-2 rounded-lg"
            >
              Add to Cart
            </button>

          </div>

        </div>

      </div>

    </div>

  </div>

</body>

</html>