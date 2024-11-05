<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $packages = Package::latest()->get();
        return view('frontend.home', compact('packages'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function forgetPassword()
    {
        return view('frontend.forget-password');
    }
}
