@extends('vendor.layout')

@section('page_title', 'User List')

@section('content')

    <div class="space-y-6">
        <div
            class="bg-white p-4 rounded-xl border shadow-sm flex flex-col md:flex-row gap-4 md:items-center md:justify-between">

            <form method="GET" class="mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search users..."
                    class="border rounded-lg px-4 py-2 w-full ">
            </form>

            <select class="border rounded-lg px-4 py-2">
                <option>All Users</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>

        </div>


        <!-- USER TABLE -->
        <div class="bg-white rounded-xl border shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-left">User</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Phone</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-left">Joined</th>
                        <th class="p-4 text-left">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-semibold">{{ $user->name }}</div>
                                    <div class="text-xs text-gray-500">Customer</div>
                                </div>
                            </td>

                            <td class="p-4">{{ $user->email }}</td>

                            <td class="p-4">N/A</td>

                            <td class="p-4">
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded">
                                    Active
                                </span>
                            </td>

                            <td class="p-4">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="p-4">
                                <button 
                                    onclick="openModal({{ $user->id }}, '{{ $user->name }}')" 
                                    class="bg-blue-600 text-white px-3 py-1 rounded text-xs">
                                    Add Feedback
                                </button>
                                <button 
                                    onclick="openRankModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->rank }}')" 
                                    class="bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                                    Add Rank
                                </button>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        <!-- PAGINATION -->
        <div class="flex justify-between items-center text-sm text-gray-600">

            <span>Showing 1 to 3 of 1,245 users</span>

            <div class="flex gap-2">
                <button class="px-3 py-1 border rounded">Prev</button>
                <button class="px-3 py-1 bg-blue-600 text-white rounded">1</button>
                <button class="px-3 py-1 border rounded">2</button>
                <button class="px-3 py-1 border rounded">Next</button>
            </div>

        </div>

    </div>



<!-- RANK MODAL -->
<div id="rankModal" class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-md rounded-xl p-6 relative">

        <button onclick="closeRankModal()" class="absolute top-3 right-3">✖</button>

        <h2 class="text-xl font-semibold mb-4">
            Update Rank for <span id="rankUserName"></span>
        </h2>

        <form method="POST" action="{{ url('/vendor/update-rank') }}">
            @csrf

            <input type="hidden" name="user_id" id="rankUserId">

            <input type="number" name="rank" id="rankValue"
                   placeholder="Enter Rank"
                   class="w-full border p-2 rounded mb-4" required>

            <button class="bg-green-600 text-white px-4 py-2 rounded w-full">
                Save Rank
            </button>

        </form>

    </div>
</div>    


    <!-- FEEDBACK MODAL -->
<div id="feedbackModal" class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-lg rounded-xl p-6 relative">

        <!-- Close -->
        <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500">✖</button>

        <h2 class="text-xl font-semibold mb-4">
            Add Feedback for <span id="userName"></span>
        </h2>

        <form method="POST" action="{{ url('/vendor/feedback/store') }}">
            @csrf

            <input type="hidden" name="user_id" id="userId">

            <!-- Star -->
            <label class="block mb-1 font-medium">Rating ⭐</label>
            <select name="star" class="w-full border p-2 rounded mb-3">
                <option value="5">5 ⭐</option>
                <option value="4">4 ⭐</option>
                <option value="3">3 ⭐</option>
                <option value="2">2 ⭐</option>
                <option value="1">1 ⭐</option>
            </select>

            <!-- Skill -->
            <input type="number" name="skill" placeholder="Skill (0-10)" max="10"
                class="w-full border p-2 rounded mb-2" required>

            <!-- Discipline -->
            <input type="number" name="discipline" placeholder="Discipline (0-10)" max="10"
                class="w-full border p-2 rounded mb-2" required>

            <!-- Fitness -->
            <input type="number" name="fitness" placeholder="Fitness (0-10)" max="10"
                class="w-full border p-2 rounded mb-2" required>

            <!-- Match -->
            <input type="number" name="match_performance" placeholder="Match Performance (0-10)" max="10"
                class="w-full border p-2 rounded mb-2" required>

            <!-- Comment -->
            <textarea name="comment" placeholder="Write feedback..."
                class="w-full border p-2 rounded mb-3"></textarea>

            <button class="bg-green-600 text-white px-4 py-2 rounded w-full">
                Submit Feedback
            </button>

        </form>

    </div>
</div>

<script>
function openRankModal(userId, userName, rank) {
    document.getElementById('rankModal').classList.remove('hidden');
    document.getElementById('rankModal').classList.add('flex');

    document.getElementById('rankUserId').value = userId;
    document.getElementById('rankUserName').innerText = userName;
    document.getElementById('rankValue').value = rank ?? '';
}

function closeRankModal() {
    document.getElementById('rankModal').classList.add('hidden');
    document.getElementById('rankModal').classList.remove('flex');
}
</script>

<script>
function openModal(userId, userName) {
    document.getElementById('feedbackModal').classList.remove('hidden');
    document.getElementById('feedbackModal').classList.add('flex');

    document.getElementById('userId').value = userId;
    document.getElementById('userName').innerText = userName;
}

function closeModal() {
    document.getElementById('feedbackModal').classList.add('hidden');
    document.getElementById('feedbackModal').classList.remove('flex');
}
</script>

@endsection