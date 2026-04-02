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
            <button onclick="openAddModal()" class="bg-blue-600 text-white px-3 py-1 rounded text-sm">
                + Add Coach
            </button>
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

            {{-- <tbody class="divide-y">

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

            </tbody> --}}

            <tbody class="divide-y">

                @foreach($coaches as $coach)

                <tr class="hover:bg-gray-50">

                    <td class="p-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold">
                            {{ strtoupper(substr($coach->name,0,1)) }}
                        </div>
                        {{ $coach->name }}
                    </td>

                    <td class="p-4">{{ $coach->role }}</td>
                    <td class="p-4">{{ $coach->speciality }}</td>
                    <td class="p-4">{{ $coach->experience }} Years</td>
                    <td class="p-4">{{ $coach->students_count }}</td>

                    <td class="p-4 text-yellow-500">
                        {{ $coach->rating }} ⭐
                    </td>

                    <td class="p-4 text-green-600 capitalize">
                        {{ $coach->status }}
                    </td>

                    <td class="p-4 space-x-2">

                        <button onclick="viewCoach({{ $coach->id }})" class="text-blue-600">
                            View
                        </button>

                        <button onclick="editCoach({{ $coach->id }})" class="text-green-600">Edit</button>

                    </td>

                </tr>

                @endforeach

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


<div id="coachModal" class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-lg p-6 rounded-xl relative">

        <!-- ❌ Close Button -->
        <button onclick="closeCoachModal()" 
                class="absolute top-3 right-3 text-gray-500 hover:text-black text-lg">
            ✖
        </button>

        <h2 class="text-lg font-semibold mb-4" id="modalTitle">Add Coach</h2>

        <form id="coachForm" method="POST">
            @csrf

            <input type="text" name="name" placeholder="Name" class="w-full border p-2 mb-2 rounded" required>
            <input type="text" name="role" placeholder="Role" class="w-full border p-2 mb-2 rounded">
            <input type="text" name="speciality" placeholder="Speciality" class="w-full border p-2 mb-2 rounded">
            <input type="number" name="experience" placeholder="Experience" class="w-full border p-2 mb-2 rounded">
            <input type="number" name="students_count" placeholder="Students" class="w-full border p-2 mb-2 rounded">
            <input type="number" step="0.1" name="rating" placeholder="Rating" class="w-full border p-2 mb-2 rounded">

            <select name="status" class="w-full border p-2 mb-3 rounded">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>

            <button class="bg-green-600 text-white px-4 py-2 rounded w-full">
                Save
            </button>

        </form>

    </div>
</div>

<!-- VIEW COACH MODAL -->
<div id="viewCoachModal" class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-lg p-6 rounded-xl relative">

        <!-- Close -->
        <button onclick="closeViewModal()" 
                class="absolute top-3 right-3 text-gray-500 text-lg">✖</button>

        <h2 class="text-lg font-semibold mb-4">Coach Details</h2>

        <div class="space-y-2 text-sm">

            <p><strong>Name:</strong> <span id="view_name"></span></p>
            <p><strong>Email:</strong> <span id="view_email"></span></p>
            <p><strong>Phone:</strong> <span id="view_phone"></span></p>

            <p><strong>Role:</strong> <span id="view_role"></span></p>
            <p><strong>Speciality:</strong> <span id="view_speciality"></span></p>

            <p><strong>Experience:</strong> <span id="view_experience"></span> Years</p>
            <p><strong>Students:</strong> <span id="view_students"></span></p>

            <p><strong>Rating:</strong> ⭐ <span id="view_rating"></span></p>
            <p><strong>Status:</strong> <span id="view_status"></span></p>

            <p><strong>Academy:</strong> <span id="view_academy"></span></p>

        </div>

    </div>

</div>

<script>
function openAddModal() {
    document.getElementById('coachModal').classList.remove('hidden');
    document.getElementById('coachModal').classList.add('flex');

    document.getElementById('coachForm').action = '/vendor/coaches/store';
    document.getElementById('modalTitle').innerText = 'Add Coach';
}

function editCoach(id) {
    fetch(`/vendor/coaches/${id}`)
    .then(res => res.json())
    .then(data => {

        openAddModal();

        document.getElementById('modalTitle').innerText = 'Edit Coach';
        document.getElementById('coachForm').action = `/vendor/coaches/update/${id}`;

        for (let key in data) {
            if (document.querySelector(`[name=${key}]`)) {
                document.querySelector(`[name=${key}]`).value = data[key];
            }
        }
    });
}


</script>

<script>
function viewCoach(id) {
    fetch(`/vendor/coaches/${id}`)
    .then(res => res.json())
    .then(data => {

        // fill data
        document.getElementById('view_name').innerText = data.name ?? '-';
        document.getElementById('view_email').innerText = data.email ?? '-';
        document.getElementById('view_phone').innerText = data.phone ?? '-';
        document.getElementById('view_role').innerText = data.role ?? '-';
        document.getElementById('view_speciality').innerText = data.speciality ?? '-';
        document.getElementById('view_experience').innerText = data.experience ?? 0;
        document.getElementById('view_students').innerText = data.students_count ?? 0;
        document.getElementById('view_rating').innerText = data.rating ?? 0;
        document.getElementById('view_status').innerText = data.status ?? '-';
        document.getElementById('view_academy').innerText = data.academy ?? '-';

        // open modal
        document.getElementById('viewCoachModal').classList.remove('hidden');
        document.getElementById('viewCoachModal').classList.add('flex');
    });
}

function closeViewModal() {
    document.getElementById('viewCoachModal').classList.add('hidden');
    document.getElementById('viewCoachModal').classList.remove('flex');
}
</script>

<script>
function closeCoachModal() {
    document.getElementById('coachModal').classList.add('hidden');
    document.getElementById('coachModal').classList.remove('flex');
}
</script>

@endsection