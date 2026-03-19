<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<style>
body{margin:0;font-family:Arial;background:#f4f7fb}

/* Sidebar */
.sidebar{
    width:220px;
    background:#111;
    color:#fff;
    height:100vh;
    position:fixed;
    padding:20px;
}
.sidebar h2{margin-bottom:20px}
.sidebar a{
    display:block;
    color:#ccc;
    text-decoration:none;
    padding:10px;
    border-radius:6px;
    margin-bottom:8px;
}
.sidebar a:hover{background:#1a6fd4;color:#fff}

/* Main */
.main{
    margin-left:240px;
    padding:20px;
}

/* Cards */
.cards{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}
.card{
    background:#fff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 4px 10px rgba(0,0,0,0.05);
    font-size:18px;
    font-weight:600;
}

/* Table */
table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
    border-radius:10px;
    overflow:hidden;
}
th,td{
    padding:12px;
    border-bottom:1px solid #eee;
}
th{background:#1a6fd4;color:#fff}
</style>
</head>

<body>

<div class="sidebar">
    <h2>Admin</h2>

    <a href="/admin/dashboard">Dashboard</a>
    <a href="/admin/users">Users</a>
    <a href="/admin/vendors">Vendors</a>
    <a href="/admin/orders">Orders</a>

    <a href="/admin/logout" style="color:red">Logout</a>
</div>

<div class="main">
    @yield('content')
</div>

</body>
</html>