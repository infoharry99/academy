@extends('vendor.layout')

@section('page_title', 'My Coaches')

@section('content')

<div class="space-y-6">

    <!-- TOP STATS -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6">

        <div class="bg-white p-5 rounded-xl border shadow-sm">
            <p class="text-sm text-gray-500">Total Coaches</p>
            <h2 class="text-2xl font-bold mt-1">12</h2>
        </div>

        <div class="bg-white p-5 rounded-xl border shadow-sm">
            <p class="text-sm text-gray-500">Active</p>
            <h2 class="text-2xl font-bold mt-1 text-green-600">10</h2>
        </div>

        <div class="bg-white p-5 rounded-xl border shadow-sm">
            <p class="text-sm text-gray-500">Sessions / Week</p>
            <h2 class="text-2xl font-bold mt-1 text-blue-600">48</h2>
        </div>

        <div class="bg-white p-5 rounded-xl border shadow-sm">
            <p class="text-sm text-gray-500">Top Rating</p>
            <h2 class="text-2xl font-bold mt-1 text-yellow-500">4.9 ⭐</h2>
        </div>

        <div class="bg-white p-5 rounded-xl border shadow-sm">
            <p class="text-sm text-gray-500">Revenue</p>
            <h2 class="text-2xl font-bold mt-1 text-purple-600">£8,450</h2>
        </div>

    </div>


    <!-- COACH PERFORMANCE CARDS -->
    <div class="grid md:grid-cols-3 gap-6">

        <!-- CARD -->
        <div class="bg-white p-5 rounded-xl shadow border">
           <h3 class="font-semibold mb-3">🏏 James Anderson</h3>

            <div class="space-y-2 text-sm">
                <p>Batting Sessions: <strong>22</strong></p>
                <p>Students: <strong>35</strong></p>
                <p>Success Rate: <strong class="text-green-600">92%</strong></p>
            </div>

            <div class="mt-4 bg-gray-100 h-2 rounded-full">
                <div class="bg-green-500 h-2 rounded-full" style="width:92%"></div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow border">
            <h3 class="font-semibold mb-3">🎯 Ben Stokes</h3>

            <div class="space-y-2 text-sm">
                <p>Bowling Sessions: <strong>18</strong></p>
                <p>Students: <strong>28</strong></p>
                <p>Accuracy: <strong class="text-blue-600">88%</strong></p>
            </div>

            <div class="mt-4 bg-gray-100 h-2 rounded-full">
                <div class="bg-blue-500 h-2 rounded-full" style="width:88%"></div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow border">
            <h3 class="font-semibold mb-3">💪 Joe Root</h3>

            <div class="space-y-2 text-sm">
                <p>Fitness Sessions: <strong>15</strong></p>
                <p>Players: <strong>20</strong></p>
                <p>Improvement: <strong class="text-yellow-500">85%</strong></p>
            </div>

            <div class="mt-4 bg-gray-100 h-2 rounded-full">
                <div class="bg-yellow-500 h-2 rounded-full" style="width:85%"></div>
            </div>
        </div>

    </div>


    <!-- COACH LIST TABLE -->
    <div class="bg-white rounded-xl border shadow-sm overflow-hidden">

        <div class="p-4 border-b font-semibold flex justify-between">
            👨‍🏫 Coach List
            <button class="bg-blue-600 text-white px-3 py-1 rounded text-sm">+ Add Coach</button>
        </div>

        <table class="w-full text-sm">

            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-4 text-left">Coach</th>
                    <th class="p-4 text-left">Role</th>
                    <th class="p-4 text-left">Speciality</th>
                    <th class="p-4 text-left">Experience</th>
                    <th class="p-4 text-left">Students</th>
                    <th class="p-4 text-left">Rating</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                <tr class="hover:bg-gray-50">
                    <td class="p-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold">R</div>
                        James Anderson
                    </td>
                    <td class="p-4">Head Coach</td>
                    <td class="p-4">Batting</td>
                    <td class="p-4">12 Years</td>
                    <td class="p-4">35</td>
                    <td class="p-4 text-yellow-500">4.9 ⭐</td>
                    <td class="p-4 text-green-600">Active</td>
                    <td class="p-4 space-x-2">
                        <button class="text-blue-600">View</button>
                        <button class="text-green-600">Edit</button>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="p-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center font-bold">A</div>
                        Alastair Cook
                    </td>
                    <td class="p-4">Assistant</td>
                    <td class="p-4">Bowling</td>
                    <td class="p-4">8 Years</td>
                    <td class="p-4">28</td>
                    <td class="p-4 text-yellow-500">4.7 ⭐</td>
                    <td class="p-4 text-green-600">Active</td>
                    <td class="p-4 space-x-2">
                        <button class="text-blue-600">View</button>
                        <button class="text-green-600">Edit</button>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>


    <!-- ACADEMY DETAILS -->
    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-blue-50 p-5 rounded-xl border">
            <h3 class="font-semibold mb-2">🏟 Adnan Academy</h3>
            <p class="text-sm text-gray-600">5 Turf Pitches • 120 Players</p>
        </div>

        <div class="bg-green-50 p-5 rounded-xl border">
            <h3 class="font-semibold mb-2">🏟 Elite Cricket Hub</h3>
            <p class="text-sm text-gray-600">Bowling Machine • Indoor Nets</p>
        </div>

        <div class="bg-yellow-50 p-5 rounded-xl border">
            <h3 class="font-semibold mb-2">🏟 PowerPlay Academy</h3>
            <p class="text-sm text-gray-600">Fitness + Strength Zone</p>
        </div>

    </div>

</div>

@endsection