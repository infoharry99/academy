<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />

  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  />

  <title>Player Profile</title>

  <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100 mb-10">

  <!-- Gradient Header -->

  <div
    class="h-64 w-full"
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

    <div class="max-w-6xl mx-auto pt-6 px-4">

      <a
        href="/dashboard"
        class="text-white flex items-center gap-2"
      >
        ← Back
      </a>

    </div>

  </div>



  <div class="max-w-6xl mx-auto px-4 -mt-32">

    <div class="grid md:grid-cols-3 gap-8">

      <!-- LEFT COLUMN -->

      <div class="space-y-6">

        <!-- Player Image -->

        <div class="bg-white p-2 rounded-xl shadow">

          <img
            src="{{ asset('assets/player-batting.jpg') }}"
            class="rounded-lg h-80 w-full"
          >

        </div>



        <!-- Player Info -->

        <div class="bg-white p-6 rounded-xl shadow">

          <h2 class="text-xl font-semibold">
            Virat Kumar
          </h2>

          <p class="text-green-600 font-medium mb-4">
            Batsman
          </p>


          <div class="space-y-2 text-sm text-gray-600">

            <div class="flex justify-between">
              <span>Age</span>
              <span>19</span>
            </div>

            <div class="flex justify-between">
              <span>Batting</span>
              <span>Right-handed</span>
            </div>

            <div class="flex justify-between">
              <span>Bowling</span>
              <span>Right-arm Medium</span>
            </div>

            <div class="flex justify-between">
              <span>Academy</span>
              <span>Elite Cricket Academy</span>
            </div>

          </div>


          <button
            class="mt-6 w-full border rounded-lg py-2 hover:bg-gray-100 transition"
          >
            Edit Profile
          </button>

        </div>

      </div>



      <!-- RIGHT COLUMN -->

      <div class="md:col-span-2 space-y-8">

        <!-- Career Stats -->

        <div>

          <h2 class="text-xl text-white font-semibold mb-4">

            Career
            <span class="text-yellow-500">
              Statistics
            </span>

          </h2>


          <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-xl shadow text-center">

              🏏

              <h3 class="text-2xl font-bold">
                48
              </h3>

              <p class="text-gray-500 text-sm">
                Matches
              </p>

            </div>


            <div class="bg-white p-6 rounded-xl shadow text-center">

              🏃

              <h3 class="text-2xl font-bold">
                2,456
              </h3>

              <p class="text-gray-500 text-sm">
                Runs
              </p>

            </div>


            <div class="bg-white p-6 rounded-xl shadow text-center">

              🎯

              <h3 class="text-2xl font-bold">
                32
              </h3>

              <p class="text-gray-500 text-sm">
                Wickets
              </p>

            </div>


            <div class="bg-white p-6 rounded-xl shadow text-center">

              ⚡

              <h3 class="text-2xl font-bold">
                138.5
              </h3>

              <p class="text-gray-500 text-sm">
                Strike Rate
              </p>

            </div>


            <div class="bg-white p-6 rounded-xl shadow text-center">

              📊

              <h3 class="text-2xl font-bold">
                51.16
              </h3>

              <p class="text-gray-500 text-sm">
                Batting Avg
              </p>

            </div>


            <div class="bg-white p-6 rounded-xl shadow text-center">

              ⭐

              <h3 class="text-2xl font-bold">
                127*
              </h3>

              <p class="text-gray-500 text-sm">
                Highest
              </p>

            </div>

          </div>

        </div>



        <!-- Match Highlights -->

        <div>

          <h2 class="text-xl font-semibold mb-4">

            🎬 Match
            <span class="text-yellow-500">
              Highlights
            </span>

          </h2>


          <div class="grid md:grid-cols-2 gap-6">

            <div class="bg-white p-4 rounded-xl shadow flex gap-4 items-center">

              <div class="bg-blue-100 p-3 rounded-lg">
                ▶
              </div>

              <div>

                <h4 class="font-medium">
                  Century vs City CC - T20 Final
                </h4>

                <p class="text-sm text-gray-500">
                  Video Highlight
                </p>

              </div>

            </div>



            <div class="bg-white p-4 rounded-xl shadow flex gap-4 items-center">

              <div class="bg-blue-100 p-3 rounded-lg">
                ▶
              </div>

              <div>

                <h4 class="font-medium">
                  Best Bowling 4/22 vs Strikers
                </h4>

                <p class="text-sm text-gray-500">
                  Video Highlight
                </p>

              </div>

            </div>



            <div class="bg-white p-4 rounded-xl shadow flex gap-4 items-center">

              <div class="bg-blue-100 p-3 rounded-lg">
                ▶
              </div>

              <div>

                <h4 class="font-medium">
                  Match Winning Knock 89*
                </h4>

                <p class="text-sm text-gray-500">
                  Video Highlight
                </p>

              </div>

            </div>



            <div class="bg-white p-4 rounded-xl shadow flex gap-4 items-center">

              <div class="bg-blue-100 p-3 rounded-lg">
                ▶
              </div>

              <div>

                <h4 class="font-medium">
                  Fielding Highlights Reel
                </h4>

                <p class="text-sm text-gray-500">
                  Video Highlight
                </p>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</body>

</html>