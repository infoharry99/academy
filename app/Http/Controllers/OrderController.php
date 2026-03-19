<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Course;

class OrderController extends Controller
{
  

public function placeOrder()
{
    $cart = Cart::where('user_id', auth()->id())->get();

    $total = 0;

    foreach ($cart as $c) {

        if ($c->type == 'training') {
            $item = Product::find($c->item_id);
        } else {
            $item = Course::find($c->item_id);
        }

        if (!$item) continue;

        // SALE PRICE LOGIC
        $price = $item->sale_price ?? $item->price;

        $total += $price * $c->qty;
    }

    $order = Order::create([
        'user_id' => auth()->id(),
        'total' => $total
    ]);

    foreach ($cart as $c) {

        if ($c->type == 'training') {
            $item = Product::find($c->item_id);
        } else {
            $item = Course::find($c->item_id);
        }

        if (!$item) continue;

        $price = $item->sale_price ?? $item->price;

        OrderItem::create([
            'order_id' => $order->id,
            'type' => $c->type,
            'item_id' => $c->item_id,
            'price' => $price,
            'qty' => $c->qty
        ]);
    }

    Cart::where('user_id', auth()->id())->delete();

    return redirect('/my-orders');
}
public function myOrders()
{
    $orders = Order::where('user_id',auth()->id())->get();
    return view('orders',compact('orders'));
}
public function orderDetail($id)
{
    $order = Order::where('user_id', auth()->id())
                  ->with('items')
                  ->findOrFail($id);

    return view('order-detail', compact('order'));
}
}
