@extends('layouts.app')

@section('content')



    <!-- Title -->
    <main class="flex-1 p-6 md:p-8  overflow-y-auto">

        <!-- Header -->

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-2xl font-semibold">

                    {{ $course->title }}

                </h1>

                <p class="text-gray-500">
                    {{ $course->description }}
                </p>

            </div>

            <div class="text-green-600 font-medium">
                📈 Form: Excellent
            </div>

        </div>



        <!-- Stats -->

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

            <div class="bg-white p-6 rounded-xl shadow">

                <h3 class="text-3xl font-bold">
                    {{ $performance->total_matches ?? 0  }}

                </h3>

                <p class="text-gray-500">
                    Matches
                </p>

            </div>


            <div class="bg-white p-6 rounded-xl shadow">

                <h3 class="text-3xl font-bold">
                    {{ $performance->runs ?? 0 }}
                </h3>

                <p class="text-gray-500">
                    Total Runs
                </p>

            </div>


            <div class="bg-white p-6 rounded-xl shadow">

                <h3 class="text-3xl font-bold">
                    {{ $performance->wickets ?? 0 }}
                </h3>

                <p class="text-gray-500">
                    Wickets
                </p>

            </div>


            <div class="bg-white p-6 rounded-xl shadow">

                <h3 class="text-3xl font-bold">
                    {{ $performance->batting_average ?? 0 }}
                </h3>

                <p class="text-gray-500">
                    Avg Rating
                </p>

            </div>

        </div>


    </main>

    <div class="p-6 md:p-8  overflow-y-auto">


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
                        {{ $performance->total_matches ?? 0 }}

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
                        {{ $performance->runs ?? 0 }}
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
                        {{ $performance->high_score ?? 0 }}
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
                        {{ $performance->batting_average ?? 0 }}
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
                        {{ $performance->strick_rate ?? 0 }}

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
                        {{ $performance->centuries ?? 0  }}

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
                        {{ $performance->half_centuries ?? 0  }}

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
                        {{ $performance->wickets ?? 0  }}

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
                        {{ $performance->best_bowlingfigures  ?? 0 }}

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
                        {{ $performance->ecconomy ?? 0  }}

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
                        {{ $performance->catches ?? 0 }}

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
    </div>

    <script>
    const performance = @json($performance);
    const fitness = @json($fitness);
    const attendance = @json($attendance);
</script>

   <script>
new Chart(
    document.getElementById("battingChart"),
    {
        type: "line",
        data: {
            labels: ["M1","M2","M3","M4","M5","M6","M7","M8"],

            datasets: [
                {
                    label: "Runs",
                    data: [
                        performance?.runs ?? 0,
                        performance?.runs ?? 0,
                        performance?.runs ?? 0,
                        performance?.runs ?? 0,
                        performance?.runs ?? 0,
                        performance?.runs ?? 0,
                        performance?.runs ?? 0,
                        performance?.runs ?? 0
                    ],
                    borderColor: "green"
                },
                {
                    label: "Strike Rate",
                    data: [
                        performance?.strick_rate ?? 0,
                        performance?.strick_rate ?? 0,
                        performance?.strick_rate ?? 0,
                        performance?.strick_rate ?? 0,
                        performance?.strick_rate ?? 0,
                        performance?.strick_rate ?? 0,
                        performance?.strick_rate ?? 0,
                        performance?.strick_rate ?? 0
                    ],
                    borderColor: "orange"
                }
            ]
        }
    }
);
</script>

<script>
new Chart(
    document.getElementById("bowlingChart"),
    {
        type: "bar",
        data: {
            labels: ["M1","M2","M3","M4","M5","M6","M7","M8"],
            datasets: [
                {
                    label: "Wickets",
                    data: Array(8).fill(performance?.wickets ?? 0),
                    backgroundColor: "green"
                },
                {
                    label: "Economy",
                    data: Array(8).fill(performance?.ecconomy ?? 0),
                    backgroundColor: "orange"
                }
            ]
        }
    }
);
</script>
<script>
new Chart(
    document.getElementById("fitnessChart"),
    {
        type: "radar",
        data: {
            labels: [
                "Speed","Stamina","Strength",
                "Agility","Flexibility","Endurance"
            ],
            datasets: [
                {
                    label: "Fitness Score",
                    data: [
                        fitness?.speed ?? 0,
                        fitness?.stamina ?? 0,
                        fitness?.strength ?? 0,
                        fitness?.agility ?? 0,
                        fitness?.flexibility ?? 0,
                        fitness?.endurance ?? 0
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
</script>
<script>
const attendanceData = {
    W1:0,W2:0,W3:0,W4:0,W5:0,W6:0,W7:0,W8:0
};

attendance.forEach(item => {
    attendanceData[item.week] = item.attendance;
});

new Chart(
    document.getElementById("attendanceChart"),
    {
        type: "bar",
        data: {
            labels: ["M1","M2","M3","M4","M5","M6","M7","M8"],
            datasets: [
                {
                    label: "Attendance",
                    data: [
                        attendanceData.W1,
                        attendanceData.W2,
                        attendanceData.W3,
                        attendanceData.W4,
                        attendanceData.W5,
                        attendanceData.W6,
                        attendanceData.W7,
                        attendanceData.W8
                    ],
                    backgroundColor: "rgb(34,197,94)"
                }
            ]
        }
    }
);
</script>
@endsection