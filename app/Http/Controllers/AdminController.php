<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use App\Models\Product;
use App\Models\Course;
use App\Models\Order;
use App\Models\Vendor;

class AdminController extends Controller
{
    // LOGIN PAGE
    public function loginForm()
    {
        return view('admin.login');
    }

    // LOGIN
public function login(Request $req)
{
    $admin = Admin::where('email', trim($req->email))->first();

    if ($admin && trim($req->password) === trim($admin->password)) {

        Session::put('admin_id', $admin->id);

        return redirect('/admin/dashboard');
    }

    return back()->with('error','Invalid email or password');
}

    // DASHBOARD
    public function dashboard()
    {
        if (!Session::has('admin_id')) {
            return redirect('/admin/login');
        }

        $data = [
            'users' => User::count(),
            'vendors' => Vendor::count(),
            'products' => Product::count(),
            'courses' => Course::count(),
            'orders' => Order::count(),
        ];

        return view('admin.dashboard', compact('data'));
    }

    // LOGOUT
    public function logout()
    {
        Session::forget('admin_id');
        return redirect('/admin/login');
    }

    // USERS LIST
public function users()
{
    $users = User::latest()->get();
    return view('admin.users', compact('users'));
}

// VENDORS LIST
public function vendors()
{
    $vendors = Vendor::latest()->get();
    return view('admin.vendors', compact('vendors'));
}

// ORDERS LIST
public function orders()
{
    $orders = Order::latest()->get();
    return view('admin.orders', compact('orders'));
}
}
