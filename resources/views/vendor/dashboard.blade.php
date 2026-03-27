@extends('vendor.layout')

@section('page_title', 'Dashboard')

@section('content')

<h2 class="text-2xl font-bold mb-6">🏏 Vendor Dashboard</h2>

<!-- ===================== -->
<!-- STATS CARDS -->
<!-- ===================== -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

    <!-- Total Orders -->
    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-gray-500 text-sm">Total Orders</p>
        <h3 class="text-3xl font-bold text-blue-600 mt-2">
            {{ $totalOrders ?? 0 }}
        </h3>
    </div>

    <!-- Total Products -->
    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-gray-500 text-sm">Total Products</p>
        <h3 class="text-3xl font-bold text-purple-600 mt-2">
            {{ $totalProducts ?? 0 }}
        </h3>
    </div>

    <!-- Total Earnings -->
    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-gray-500 text-sm">Total Earnings (£)</p>
        <h3 class="text-3xl font-bold text-green-600 mt-2">
            £ {{ number_format($totalEarnings ?? 0, 2) }}
        </h3>
    </div>

</div>

<!-- ===================== -->
<!-- CHARTS -->
<!-- ===================== -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- Orders Chart -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-4">📦 Orders Overview</h3>
        <canvas id="ordersChart"></canvas>
    </div>

    <!-- Earnings Chart -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-4">💰 Earnings Overview</h3>
        <canvas id="earningsChart"></canvas>
    </div>

</div>

<!-- ===================== -->
<!-- RECENT ORDERS -->
<!-- ===================== -->
<div class="bg-white p-6 rounded-xl shadow mt-10">

    <h3 class="text-lg font-semibold mb-4">🧾 Recent Orders</h3>

    <table class="w-full text-sm">
        <thead>
            <tr class="text-left border-b">
                <th class="py-2">Order ID</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentOrders ?? [] as $order)
                <tr class="border-b">
                    <td class="py-2">#1</td>
                    <td>£5666</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

<!-- ===================== -->
<!-- CHART JS -->
<!-- ===================== -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

// Orders Chart
const ordersChart = new Chart(document.getElementById('ordersChart'), {
    type: 'bar',
    data: {
        labels: @json($orderLabels ?? ['Jan','Feb','Mar']),
        datasets: [{
            label: 'Orders',
            data: @json($orderData ?? [5,10,7]),
            backgroundColor: 'rgba(37, 99, 235, 0.6)'
        }]
    }
});

// Earnings Chart
const earningsChart = new Chart(document.getElementById('earningsChart'), {
    type: 'line',
    data: {
        labels: @json($earningLabels ?? ['Jan','Feb','Mar']),
        datasets: [{
            label: 'Earnings (£)',
            data: @json($earningData ?? [200,500,300]),
            borderColor: 'green',
            backgroundColor: 'rgba(34,197,94,0.2)',
            fill: true
        }]
    }
});

</script>