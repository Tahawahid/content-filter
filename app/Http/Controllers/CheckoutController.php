<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    // public function store(Request $request)
    // {

    //     $validated = $request->validate([
    //         'name' => 'required',
    //         'phone' => 'required',
    //         'email' => 'required|email',
    //         'state' => 'required',
    //         'city' => 'required',
    //         'zipcode' => 'required',
    //         'payment_receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    //     ]);


    //     // Create user details once, as these are the same for all packages
    //     $userDetails =  UserDetail::create([
    //         'user_id' => Auth::id(),
    //         'name' => $validated['name'],
    //         'phone_number' => $validated['phone'],
    //         'email' => $validated['email'],
    //         'state' => $validated['state'],
    //         'city' => $validated['city'],
    //         'zipcode' => $validated['zipcode'],
    //     ]);



    //     // Get cart items from session or request
    //     $cartItems = session()->get('cart', []);  // Assuming you are storing cart in session
    //     // dd($cartItems);
    //     foreach ($cartItems as $item) {
    //         // Validate and fetch each package from the database
    //         $package = Package::findOrFail($item['id']);

    //         $receiptPath = null;
    //         if ($request->hasFile('payment_receipt')) {
    //             $file = $request->file('payment_receipt');
    //             $order = Order::create([
    //                 'user_id' => Auth::id(),
    //                 'user_detail_id' => $userDetails->id,
    //                 'package_id' => $package->id,
    //                 'price' => $package->price,
    //                 'status' => 'pending',
    //                 'total' => $request->total,
    //                 'tokens' => $package->token
    //             ]);

    //             $filename = time() . '_receipt_' . Auth::id() . '_' . $order->id . '.' . $file->getClientOriginalExtension();
    //             $file->move(public_path('receipts'), $filename);

    //             $order->update(['payment_receipt' => 'receipts/' . $filename]);
    //         }

    //         // Create an order for each package in the cart
    //         Order::create([
    //             'user_id' => Auth::id(),
    //             'user_detail_id' => $userDetails->id,
    //             'package_id' => $package->id,
    //             'price' => $package->price,
    //             'status' => 'pending',
    //             'total' => $request->total,
    //             'tokens' => $package->token,
    //             'payment_receipt' => $receiptPath
    //         ]);
    //     }

    //     // Clear the cart after successful checkout
    //     session()->forget('cart');

    //     return redirect()->route('cart.index')->with('success', 'Order placed successfully');
    // }

    // public function store(Request $request)
    // {
    //     try {
    //         DB::beginTransaction();

    //         $validated = $request->validate([
    //             'name' => 'required',
    //             'phone' => 'required',
    //             'email' => 'required|email',
    //             'state' => 'required',
    //             'city' => 'required',
    //             'zipcode' => 'required',
    //             'payment_receipt' => 'required|url'
    //         ]);

    //         $userDetails = UserDetail::create([
    //             'user_id' => Auth::id(),
    //             'name' => $validated['name'],
    //             'phone_number' => $validated['phone'],
    //             'email' => $validated['email'],
    //             'state' => $validated['state'],
    //             'city' => $validated['city'],
    //             'zipcode' => $validated['zipcode'],
    //         ]);

    //         $receiptUrl = $request->payment_receipt;
    //         $cartItems = session()->get('cart', []);

    //         foreach ($cartItems as $item) {
    //             $package = Package::findOrFail($item['id']);

    //             Order::create([
    //                 'user_id' => Auth::id(),
    //                 'user_detail_id' => $userDetails->id,
    //                 'package_id' => $package->id,
    //                 'price' => $package->price,
    //                 'status' => 'pending',
    //                 'total' => $request->total,
    //                 'tokens' => $package->token,
    //                 'payment_receipt' => $receiptUrl
    //             ]);
    //         }

    //         DB::commit();
    //         session()->forget('cart');
    //         return redirect()->route('cart.index')->with('success', 'Order placed successfully');
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return redirect()->back()->with('error', 'Order placement failed. Please try again.');
    //     }
    // }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'state' => 'required',
                'city' => 'required',
                'zipcode' => 'required',
                'payment_receipt_url' => 'required_without:payment_receipt_file|url|nullable',
                'payment_receipt_file' => 'required_without:payment_receipt_url|file|mimes:pdf,png,jpg,jpeg|max:2048|nullable'
            ]);

            $userDetails = UserDetail::create([
                'user_id' => Auth::id(),
                'name' => $validated['name'],
                'phone_number' => $validated['phone'],
                'email' => $validated['email'],
                'state' => $validated['state'],
                'city' => $validated['city'],
                'zipcode' => $validated['zipcode'],
            ]);

            $cartItems = session()->get('cart', []);
            $receiptPath = null;

            if ($request->hasFile('payment_receipt_file')) {
                $file = $request->file('payment_receipt_file');
                $filename = time() . '_' . Auth::id() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('receipts'), $filename);
                $receiptPath = 'receipts/' . $filename;
            } else {
                $receiptPath = $request->payment_receipt_url;
            }

            foreach ($cartItems as $item) {
                $package = Package::findOrFail($item['id']);
                Order::create([
                    'user_id' => Auth::id(),
                    'user_detail_id' => $userDetails->id,
                    'package_id' => $package->id,
                    'price' => $package->price,
                    'status' => 'pending',
                    'total' => $request->total,
                    'tokens' => $package->token,
                    'payment_receipt' => $receiptPath
                ]);
            }

            DB::commit();
            session()->forget('cart');
            return redirect()->route('cart.index')->with('success', 'Order placed successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Order placement failed. Please try again.');
        }
    }
}
