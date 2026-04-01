@extends('vendor.layout')

@section('page_title', 'My Transactions')

@section('content')

    <div class="space-y-6">

        <!-- TOP CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <div class="bg-white p-5 rounded-xl border shadow-sm">
                <p class="text-sm text-gray-500">Total Earnings</p>
                <h2 class="text-2xl font-bold mt-1 text-green-600">£{{ $total }}</h2>
            </div>



            <div class="bg-white p-5 rounded-xl border shadow-sm">
                <p class="text-sm text-gray-500">Pending</p>
                <h2 class="text-2xl font-bold mt-1 text-yellow-600">£{{ $pending }}</h2>
            </div>

            <div class="bg-white p-5 rounded-xl border shadow-sm">
                <p class="text-sm text-gray-500">Completed</p>
                <h2 class="text-2xl font-bold mt-1">£{{ $completed }}</h2>
            </div>

        </div>


        <!-- FILTER BAR -->
        <div
            class="bg-white p-4 rounded-xl border shadow-sm flex flex-col md:flex-row gap-4 md:items-center md:justify-between">

            <input type="text" placeholder="Search by user or ID..."
                class="border rounded-lg px-4 py-2 w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <form method="GET">
    <input type="text" name="search" value="{{ request('search') }}"
        placeholder="Search..."
        class="border px-3 py-2 rounded">
</form>

           

        </div>


        <!-- TRANSACTION TABLE -->
        <div class="bg-white rounded-xl border shadow-sm overflow-hidden">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-left">Transaction ID</th>
                        <th class="p-4 text-left">User</th>
                        <th class="p-4 text-left">Type</th>
                        <th class="p-4 text-left">Amount</th>
                        <th class="p-4 text-left">Date</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-left">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @foreach($payments as $payment)

                            <tr>
                                <td>#{{ $payment->transaction_id }}</td>

                                <td>{{ $payment->user->name ?? 'N/A' }}</td>

                                <td>
                                    @foreach($payment->order->items as $item)
                                        {{ ucfirst($item->type) }}
                                    @endforeach
                                </td>

                                <td>£{{ $payment->amount }}</td>

                                <td>{{ $payment->created_at->format('d M Y') }}</td>

                                <td>
                                    <span class="px-2 py-1 text-xs rounded
                        {{ $payment->status == 'completed' ? 'bg-green-100 text-green-600' : '' }}
                        {{ $payment->status == 'pending' ? 'bg-yellow-100 text-yellow-600' : '' }}
                        {{ $payment->status == 'failed' ? 'bg-red-100 text-red-600' : '' }}">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('vendor.transaction.view', $payment->id) }}" class="text-blue-600">View</a>
                                </td>
                            </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        <!-- SUMMARY -->
        <div class="bg-blue-50 p-5 rounded-xl border flex justify-between items-center">

            <div>
                <p class="text-sm text-gray-500">Total Transactions</p>
                <h3 class="text-xl font-bold">327</h3>
            </div>

            <div>
                <p class="text-sm text-gray-500">Net Revenue</p>
                <h3 class="text-xl font-bold text-green-600">£12,450</h3>
            </div>

        </div>


        <!-- PAGINATION -->
        <div class="flex justify-between items-center text-sm text-gray-600">

            <span>Showing 1 to 3 of 327 transactions</span>

            <div class="flex gap-2">
                <button class="px-3 py-1 border rounded">Prev</button>
                <button class="px-3 py-1 bg-blue-600 text-white rounded">1</button>
                <button class="px-3 py-1 border rounded">2</button>
                <button class="px-3 py-1 border rounded">Next</button>
            </div>

        </div>

    </div>

@endsection