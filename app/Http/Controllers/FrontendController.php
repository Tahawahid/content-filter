<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $packages = Package::latest()->get();
        $cart = session()->get('cart', []);
        $total = 0;
        $totalTokens = 0;

        foreach ($cart as $item) {
            $total += $item['price'] ?? 0;
            $totalTokens += $item['tokens'] ?? 0;
        }
        return view('frontend.home', compact('packages', 'total'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function forgetPassword()
    {
        return view('frontend.forget-password');
    }
}
