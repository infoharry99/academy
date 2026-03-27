@extends('dashboard.layouts.app')

@section('content')
      <!-- MAIN CONTENT -->

      

        



        <!-- Title -->

        <h2 class="text-xl font-semibold mb-6">

          📊 Performance

          <span class="text-yellow-500">
            Analytics
          </span>

        </h2>



        <!-- Charts -->

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

          <!-- Batting -->

          <div class="bg-white p-6 rounded-xl shadow">

            <h3 class="font-semibold mb-4">
              Batting Performance
            </h3>

            <canvas id="battingChart"></canvas>

          </div>



          <!-- Bowling -->

          <div class="bg-white p-6 rounded-xl shadow">

            <h3 class="font-semibold mb-4">
              Bowling Performance
            </h3>

            <canvas id="bowlingChart"></canvas>

          </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-10">

        <!-- Fitness Tracking -->

        <div class="bg-white p-6 rounded-xl shadow">

            <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
            📊 Fitness Tracking
            </h3>

            <canvas id="fitnessChart"></canvas>

        </div>
        <!-- Training Attendance -->
        <div class="bg-white p-6 rounded-xl shadow">

            <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
            📅 Training Attendance
            </h3>

            <canvas id="attendanceChart"></canvas>

        </div>
        </div>

        <!-- Match Statistics -->

        <div class="mt-10">

        <h2 class="text-xl font-semibold mb-6 flex items-center gap-2">
            🏏 Match
            <span class="text-yellow-500">
            Statistics
            </span>
        </h2>


        <div class="grid md:grid-cols-4 gap-6">

            <!-- Card -->

            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                🏏
            </div>

            <h3 class="text-3xl font-bold">
                48
            </h3>

            <p class="text-gray-500">
                Matches Played
            </p>

            </div>



            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                🏃
            </div>

            <h3 class="text-3xl font-bold">
                2,456
            </h3>

            <p class="text-gray-500">
                Runs Scored
            </p>

            </div>



            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                🌟
            </div>

            <h3 class="text-3xl font-bold">
                127*
            </h3>

            <p class="text-gray-500">
                Highest Score
            </p>

            </div>



            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                📊
            </div>

            <h3 class="text-3xl font-bold">
                51.16
            </h3>

            <p class="text-gray-500">
                Batting Avg
            </p>

            </div>



            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                ⚡
            </div>

            <h3 class="text-3xl font-bold">
                138.5
            </h3>

            <p class="text-gray-500">
                Strike Rate
            </p>

            </div>



            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                💯
            </div>

            <h3 class="text-3xl font-bold">
                5
            </h3>

            <p class="text-gray-500">
                Centuries
            </p>

            </div>



            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                5️⃣
            </div>

            <h3 class="text-3xl font-bold">
                12
            </h3>

            <p class="text-gray-500">
                Half Centuries
            </p>

            </div>



            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                🎯
            </div>

            <h3 class="text-3xl font-bold">
                32
            </h3>

            <p class="text-gray-500">
                Wickets Taken
            </p>

            </div>



            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                🏆
            </div>

            <h3 class="text-3xl font-bold">
                4/22
            </h3>

            <p class="text-gray-500">
                Best Bowling
            </p>

            </div>



            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                📉
            </div>

            <h3 class="text-3xl font-bold">
                6.2
            </h3>

            <p class="text-gray-500">
                Economy Rate
            </p>

            </div>



            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                🙌
            </div>

            <h3 class="text-3xl font-bold">
                28
            </h3>

            <p class="text-gray-500">
                Catches
            </p>

            </div>



            <div class="bg-white p-6 rounded-xl shadow text-center">

            <div class="text-3xl mb-2">
                🏃‍♂️
            </div>

            <h3 class="text-3xl font-bold">
                8
            </h3>

            <p class="text-gray-500">
                Run Outs
            </p>

            </div>

        </div>

        </div>


    <script>

      new Chart(
        document.getElementById("battingChart"),
        {
          type: "line",

          data: {
            labels: ["M1", "M2", "M3", "M4", "M5", "M6", "M7", "M8"],

            datasets: [
              {
                label: "Runs",
                data: [45, 78, 22, 101, 67, 88, 54, 90],
                borderColor: "green"
              },

              {
                label: "Strike Rate",
                data: [120, 145, 98, 160, 134, 142, 128, 150],
                borderColor: "orange"
              }
            ]
          }
        }
      );


      new Chart(
        document.getElementById("bowlingChart"),
        {
          type: "bar",

          data: {
            labels: ["M1", "M2", "M3", "M4", "M5", "M6", "M7", "M8"],

            datasets: [
              {
                label: "Wickets",
                data: [2, 1, 3, 0, 4, 2, 1, 3],
                backgroundColor: "green"
              },

              {
                label: "Economy",
                data: [6, 7, 5, 8, 4, 6, 7, 5],
                backgroundColor: "orange"
              }
            ]
          }
        }
      );

    </script>
    <script>

    /* Fitness Radar Chart */

    new Chart(
        document.getElementById("fitnessChart"),
        {
        type: "radar",

        data: {
            labels: [
            "Speed",
            "Stamina",
            "Strength",
            "Agility",
            "Flexibility",
            "Endurance"
            ],

            datasets: [
            {
                label: "Fitness Score",

                data: [
                85,
                70,
                90,
                80,
                60,
                88
                ],

                backgroundColor: "rgba(34,197,94,0.3)",
                borderColor: "rgb(34,197,94)",
                borderWidth: 2
            }
            ]
        },

        options: {
            scales: {
            r: {
                beginAtZero: true,
                max: 100
            }
            }
        }
        }
    );



    /* Attendance Bar Chart */

    new Chart(
        document.getElementById("attendanceChart"),
        {
        type: "bar",

        data: {
            labels: [
            "W1",
            "W2",
            "W3",
            "W4",
            "W5",
            "W6",
            "W7",
            "W8"
            ],

            datasets: [
            {
                label: "Attendance",

                data: [
                5,
                6,
                4,
                6,
                5,
                6,
                7,
                5
                ],

                backgroundColor: "rgb(34,197,94)"
            }
            ]
        },

        options: {
            scales: {
            y: {
                beginAtZero: true,
                ticks: {
                stepSize: 1
                }
            }
            }
        }
        }
    );

    </script>

@endsection    
