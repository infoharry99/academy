<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Course;
use Illuminate\Support\Facades\Session;

class VendorController extends Controller
{
    // ✅ Register Form
    public function registerForm()
    {
        return view('vendor.register');
    }

    // ✅ Register Save
    public function register(Request $req)
    {
        Vendor::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'type' => $req->type
        ]);

        return redirect('/vendor/login');
    }

    // ✅ Login Form
    public function loginForm()
    {
        return view('vendor.login');
    }

    // ✅ LOGIN METHOD (YAHI MISSING THA 🔥)
    public function login(Request $req)
    {
        $vendor = Vendor::where('email', $req->email)->first();

        if ($vendor && password_verify($req->password, $vendor->password)) {

            Session::put('vendor_id', $vendor->id);
            Session::put('vendor_type', $vendor->type);

            return redirect('/vendor/dashboard');
        }

        return back()->with('error', 'Invalid Email or Password');
    }

    // ✅ Dashboard
   public function dashboard()
{
    if (!Session::has('vendor_id')) {
        return redirect('/vendor/login');
    }

    $type = Session::get('vendor_type');

    // 🔥 type के हिसाब से dashboard redirect
    if($type == 'training'){
        return redirect('/vendor/training');
    }else{
        return redirect('/vendor/course');
    }
}

    // ✅ Logout
    public function logout()
    {
        Session::forget('vendor_id');
        Session::forget('vendor_type');

        return redirect('/vendor/login');
    }

    public function vendorOrders()
{
    $vendorId = Session::get('vendor_id');

    // vendor ke products ids
    $productIds = Product::where('vendor_id', $vendorId)->pluck('id');

    // sirf us vendor ke products ke orders
    $orders = OrderItem::with(['order.user'])
        ->where('type', 'training')
        ->whereIn('item_id', $productIds)
        ->get();

    return view('vendor.training.orders', compact('orders'));
}

public function courseOrders()
{
    $vendorId = Session::get('vendor_id');

    // vendor ke course ids
    $courseIds = Course::where('vendor_id', $vendorId)->pluck('id');

    // sirf us vendor ke course orders
    $orders = OrderItem::with(['order.user', 'course'])
        ->where('type', 'course')
        ->whereIn('item_id', $courseIds)
        ->get();

    return view('vendor.course.orders', compact('orders'));
}
public function profile()
{
    if (!Session::has('vendor_id')) {
        return redirect('/vendor/login');
    }

    $vendor = Vendor::find(Session::get('vendor_id'));

    return view('vendor.profile', compact('vendor'));
}
}