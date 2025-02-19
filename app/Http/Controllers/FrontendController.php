<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\HowItWorks;
use App\Models\Package;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $banner = Banner::first();
        $packages = Package::latest()->get();
        $brand = Brand::first();
        $feature = Feature::first();
        $boxes = $feature ? $feature->boxes : [];
        $howItWorks = HowItWorks::first();
        $faqs = Faq::where('is_active', true)->orderBy('order')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('order')->get();
        $cart = session()->get('cart', []);
        $total = 0;
        $totalTokens = 0;

        foreach ($cart as $item) {
            $total += $item['price'] ?? 0;
            $totalTokens += $item['tokens'] ?? 0;
        }
        return view('frontend.home', compact('packages', 'total', 'banner', 'brand', 'feature', 'boxes', 'howItWorks', 'faqs', 'testimonials'));
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
