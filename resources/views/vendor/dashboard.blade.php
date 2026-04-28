@extends('vendor.layout')

@section('content')

<div class="p-6">

    <h2 class="text-2xl font-bold mb-6"> Dashboard</h2>

    <!-- ===================== -->
    <!-- STATS -->
    <!-- ===================== -->
   <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

    <div class="bg-white p-6 rounded-xl shadow">
        <p>Total Products</p>
        <h3>{{ $totalProducts }}</h3>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p>Total Trainings</p>
        <h3>{{ $totalCourses }}</h3>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p>Total Orders</p>
        <h3>{{ $totalOrders }}</h3>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p>Total Earnings</p>
        <h3>£{{ $totalEarnings }}</h3>
    </div>

</div>

    <!-- ===================== -->
    <!-- CHARTS -->
    <!-- ===================== -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6  mt-10">

        <div class="bg-white p-6 rounded-xl shadow">
            <h3>Orders Overview</h3>
            <canvas id="ordersChart"></canvas>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3>Earnings Overview</h3>
            <canvas id="earningsChart"></canvas>
        </div>

    </div>


</div>

<!-- ===================== -->
<!-- CHART SCRIPT -->
<!-- ===================== -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

// Orders
const ordersData = @json(array_values($monthlyOrders->toArray()));
const ordersLabels = @json(array_keys($monthlyOrders->toArray())).map(m => months[m-1]);

// Earnings
const earningsData = @json(array_values($monthlyEarnings->toArray()));
const earningsLabels = @json(array_keys($monthlyEarnings->toArray())).map(m => months[m-1]);

new Chart(document.getElementById('ordersChart'), {
    type: 'bar',
    data: {
        labels: ordersLabels,
        datasets: [{
            label: 'Orders',
            data: ordersData,
            backgroundColor: 'blue'
        }]
    }
});

new Chart(document.getElementById('earningsChart'), {
    type: 'line',
    data: {
        labels: earningsLabels,
        datasets: [{
            label: 'Earnings',
            data: earningsData,
            borderColor: 'green',
            fill: true
        }]
    }
});

</script>

@endsection