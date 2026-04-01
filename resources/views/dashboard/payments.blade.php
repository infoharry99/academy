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
                <h3 class="text-2xl font-bold text-green-600">
                    £{{ $payments->sum('amount') }}
                </h3>
            </div>






            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-sm text-gray-500">Completed</p>
                <h3 class="text-2xl font-bold text-blue-600">
                    {{ $payments->where('status', 'completed')->count() }}
                </h3>
            </div>

            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-sm text-gray-500">Pending</p>
                <h3 class="text-2xl font-bold text-yellow-500">
                    {{ $payments->where('status', 'pending')->count() }}
                </h3>
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
                            <!-- <th class="px-4 py-3">Type</th> -->
                            <th class="px-4 py-3">Amount</th>
                            <th class="px-4 py-3">Method</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">

                        @forelse($payments as $p)

                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 font-medium">
                                            #{{ $p->transaction_id }}
                                        </td>

                                        <!-- <td class="px-4 py-3">
                                            {{ ucfirst($p->type) }}
                                        </td> -->

                                        <td class="px-4 py-3 text-green-600 font-semibold">
                                            £{{ number_format($p->amount, 2) }}
                                        </td>

                                        <td class="px-4 py-3">
                                            {{ ucfirst($p->method) }}
                                        </td>

                                        <td class="px-4 py-3">
                                            {{ $p->created_at->format('d M Y') }}
                                        </td>

                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full
                            @if($p->status == 'completed') bg-green-100 text-green-600
                            @else bg-yellow-100 text-yellow-600 @endif">

                                                {{ ucfirst($p->status) }}
                                            </span>
                                        </td>
                                    </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-6 text-gray-500">
                                    No transactions found
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>



    </div>

@endsection