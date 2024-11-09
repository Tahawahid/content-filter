<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return redirect()->route('login')->with('message', 'Please login to continue checkout');
        }

        $cartItems = session()->get('cart', []);
        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item['price'];
        }

        return view('frontend.checkout.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zipcode' => 'required|string'
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'total' => $request->total,
            'items' => json_encode(session()->get('cart')),
            'status' => 'pending'
        ]);

        session()->forget(['cart', 'cart_total']);

        return redirect()->route('dashboard.client.home')->with('success', 'Your order has been placed successfully!');
    }
}
