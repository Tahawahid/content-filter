<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        // dd($cart);
        $total = 0;
        $totalTokens = 0;

        foreach ($cart as $item) {
            $total += $item['price'];
            $totalTokens += $item['tokens'];
        }

        return view('frontend.cart.index', compact('cart', 'total', 'totalTokens'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Package $package)
    {
        // $cart = session()->get('cart', []);
        // $cart[] = [
        //     'id' => $package->id,
        //     'name' => $package->name,
        //     'price' => $package->price,
        //     'features' => $package->features
        // ];

        // session()->put('cart', $cart);

        // return redirect()->route('cart.index')->with('success', 'Package added to cart successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        $cart[$request->id] = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => floatval($request->price),
            'tokens' => intval($request->tokens),
        ];

        session()->put('cart', $cart);

        return redirect()->back();
    }

    // public function store(Request $request)
    // {
    //     $cart = session()->get('cart', []);
    //     $id = $request->id;

    //     if (isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "name" => $request->name,
    //             "price" => $request->price,
    //             "tokens" => $request->tokens,
    //             "quantity" => 1
    //         ];
    //     }

    //     session()->put('cart', $cart);

    //     $total = array_reduce($cart, function ($sum, $item) {
    //         return $sum + $item['price'] * $item['quantity'];
    //     }, 0);

    //     session()->put('cart_total', $total);

    //     return response()->json([
    //         'success' => true,
    //         'cart' => $cart,
    //         'total' => $total
    //     ]);
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cart = session()->get('cart', []);
        $cart[$id] = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'features' => $request->features
        ];

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Package added to cart',
            'cart' => $cart,
            'total' => collect($cart)->sum('price')
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Package removed successfully!');
    }
}
