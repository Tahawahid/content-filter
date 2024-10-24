<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
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
