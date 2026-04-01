<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Course;
use App\Models\Vendor;


class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::where('user_id', auth()->id())->latest()->get();

        return view('dashboard.payments', compact('payments'));
    }

    public function indexVendor(Request $request)
{
    // 🔥 correct vendor
    $vendor = Vendor::where('user_id', auth()->id())->first();
    if (!$vendor) {
        return back()->with('error','Vendor not found');
    }

    $vendorId = $vendor->id;

    $payments = Payment::with('user')
        ->where('vendor_id', $vendorId)
        ->latest()
        ->get();

    // SEARCH
    if ($request->search) {
        $payments = $payments->filter(function ($p) use ($request) {
            return str_contains(strtolower($p->transaction_id), strtolower($request->search)) ||
                   str_contains(strtolower(optional($p->user)->name), strtolower($request->search));
        });
    }

    $total = $payments->sum('amount');
    $pending = $payments->where('status','pending')->sum('amount');
    $completed = $payments->where('status','completed')->count();

    return view('vendor.transactiondetails', compact('payments','total','pending','completed'));
}
    public function userList(Request $request)
    {
        $vendorId = auth()->id();

        // ✅ vendor ke payments se users nikaalo
        $payments = Payment::with('user')
            ->where('vendor_id', $vendorId)
            ->get();

        // ✅ unique users
        $users = $payments->pluck('user')->unique('id');

        // ✅ SEARCH
        if ($request->search) {
            $users = $users->filter(function ($u) use ($request) {
                return str_contains(strtolower($u->name), strtolower($request->search)) ||
                    str_contains(strtolower($u->email), strtolower($request->search));
            });
        }

        // ✅ stats
        $totalUsers = $users->count();

        return view('vendor.userlist', compact('users', 'totalUsers'));
    }


    public function vendorDashboard()
{
    $vendor = Vendor::where('user_id', auth()->id())->first();

    if (!$vendor) {
        return back()->with('error', 'Vendor not found');
    }

    $vendorId = $vendor->id;

    // ✅ PRODUCTS COUNT
    $totalProducts = Product::where('vendor_id', $vendorId)->count();

    // ✅ COURSES COUNT
    $totalCourses = Course::where('vendor_id', $vendorId)->count();

    // ✅ PAYMENTS (EARNINGS)
    $payments = Payment::where('vendor_id', $vendorId)->get();

    $totalEarnings = $payments->sum('amount');

    // ✅ MONTHLY EARNINGS (Chart)
    $monthlyEarnings = Payment::where('vendor_id', $vendorId)
        ->selectRaw('MONTH(created_at) as month, SUM(amount) as total')
        ->groupBy('month')
        ->pluck('total', 'month');

    // ✅ MONTHLY ORDERS (Chart)
    $monthlyOrders = Payment::where('vendor_id', $vendorId)
        ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->pluck('total', 'month');

    // ✅ RECENT ORDERS
    $recentOrders = Payment::where('vendor_id', $vendorId)
        ->latest()
        ->take(5)
        ->get();

    return view('vendor.dashboard', compact(
        'totalProducts',
        'totalCourses',
        'totalEarnings',
        'monthlyEarnings',
        'monthlyOrders',
        'recentOrders'
    ));
}
}
