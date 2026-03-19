<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
 public function add($type,$id)
{
     if (!auth()->check()) {
        return redirect('/login')->with('error','Please login first');
    }
    Cart::create([
        'user_id'=>auth()->id(),
        'type'=>$type,
        'item_id'=>$id,
        'qty'=>1
    ]);

     return redirect('/cart'); // ✅ direct cart page
}

// CART PAGE
public function index()
{
    $cart = Cart::where('user_id',auth()->id())->get();
    return view('cart',compact('cart'));
}
public function remove($id)
{
    $cart = Cart::where('id', $id)
                ->where('user_id', auth()->id())
                ->first();

    if ($cart) {
        $cart->delete();
    }

    return redirect('/cart')->with('success', 'Item removed from cart');
}
}
