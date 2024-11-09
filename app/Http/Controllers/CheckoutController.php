<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return redirect()->route('login')->with('message', 'Please login to continue checkout');
        }

        $cartItems = session()->get('cart', []);
        // dd($cartItems);
        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item['price'];
        }

        return view('frontend.checkout.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required'
        ]);

        // Create user details once, as these are the same for all packages
        $userDetails =  UserDetail::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'phone_number' => $validated['phone'],
            'email' => $validated['email'],
            'state' => $validated['state'],
            'city' => $validated['city'],
            'zipcode' => $validated['zipcode']
        ]);



        // Get cart items from session or request
        $cartItems = session()->get('cart', []);  // Assuming you are storing cart in session
        // dd($cartItems);
        foreach ($cartItems as $item) {
            // Validate and fetch each package from the database
            $package = Package::findOrFail($item['id']);


            // Create an order for each package in the cart
            $order = Order::create([
                'user_id' => Auth::id(),
                'user_detail_id' => $userDetails->id,
                'package_id' => $package->id,
                'price' => $package->price,
                'status' => 'pending',
                'total' => $request->total,
                'tokens' => $package->token
            ]);
        }

        // Clear the cart after successful checkout
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Order placed successfully');
    }
}
