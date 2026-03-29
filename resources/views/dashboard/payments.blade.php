@extends('dashboard.layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <!-- HEADER -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">💳 Payment History</h2>
        <p class="text-gray-500 text-sm">View all your transactions and payment details</p>
    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Payments</p>
            <h3 class="text-2xl font-bold text-green-600">£12,450</h3>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-sm text-gray-500">Completed</p>
            <h3 class="text-2xl font-bold text-blue-600">18</h3>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-sm text-gray-500">Pending</p>
            <h3 class="text-2xl font-bold text-yellow-500">3</h3>
        </div>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="p-4 border-b font-semibold text-gray-700">
            All Transactions
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">

                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Method</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    <!-- ROW -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">#TXN001</td>
                        <td class="px-4 py-3">Training Purchase</td>
                        <td class="px-4 py-3 text-green-600 font-semibold">£120</td>
                        <td class="px-4 py-3">Card</td>
                        <td class="px-4 py-3">12 Mar 2026</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600">
                                Completed
                            </span>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">#TXN002</td>
                        <td class="px-4 py-3">Product Purchase</td>
                        <td class="px-4 py-3 text-green-600 font-semibold">£80</td>
                        <td class="px-4 py-3">UPI</td>
                        <td class="px-4 py-3">15 Mar 2026</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-600">
                                Pending
                            </span>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">#TXN003</td>
                        <td class="px-4 py-3">Monthly Training</td>
                        <td class="px-4 py-3 text-green-600 font-semibold">£250</td>
                        <td class="px-4 py-3">Card</td>
                        <td class="px-4 py-3">20 Mar 2026</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600">
                                Completed
                            </span>
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>

    </div>

    <!-- RECENT ACTIVITY -->
    <div class="mt-10">

        <h3 class="text-lg font-semibold mb-4">📊 Recent Activity</h3>

        <div class="bg-white rounded-xl shadow p-5 space-y-4">

            <div class="flex justify-between items-center">
                <div>
                    <p class="font-medium">Training Payment</p>
                    <p class="text-xs text-gray-500">2 hours ago</p>
                </div>
                <span class="text-green-600 font-semibold">+£120</span>
            </div>

            <div class="flex justify-between items-center">
                <div>
                    <p class="font-medium">Product Purchase</p>
                    <p class="text-xs text-gray-500">Yesterday</p>
                </div>
                <span class="text-green-600 font-semibold">+£80</span>
            </div>

        </div>

    </div>

</div>

@endsection