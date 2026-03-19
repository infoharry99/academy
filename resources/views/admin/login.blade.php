<form method="POST" action="/admin/login" style="max-width:400px;margin:100px auto">
    @csrf

    <h2>Admin Login</h2>

    <input name="email" placeholder="Email" required style="width:100%;padding:10px;margin:10px 0">
    <input name="password" type="password" placeholder="Password" required style="width:100%;padding:10px;margin:10px 0">

    <button style="width:100%;padding:10px;background:#1a6fd4;color:#fff">Login</button>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif
</form>